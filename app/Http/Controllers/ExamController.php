<?php
    namespace App\Http\Controllers;

    use App;
    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\Module;
    use App\Models\Record;
    use Auth;
    use Carbon\Carbon;
    use Cviebrock\EloquentSluggable\Services\SlugService;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Intervention\Image\ImageManagerStatic as Image;
    use Storage;

    class ExamController extends Controller{
        /**
         * * Show the 'exam rules' page.
         * @param null|string $id_evaluation - Evaluation primary key.
         * @param Request $request
         * @return [type]
         */
        public function rules(Request $request, $id_evaluation){
            $candidate = Auth::guard('candidates')->user();

            if(!$evaluation = Evaluation::find($id_evaluation)){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Evaluation not found.',
                ]);
            }

            if($request->session()->has('error')){
                $error = (object) $request->session()->pull('error');
                return view('exams.rules', [
                    'evaluation' => $evaluation,
                    'validation' => (object)[
                        'rules' => Exam::$validation['auth']['rules'],
                        'messages' => Exam::$validation['auth']['messages']['en'],
                    ], 'status' => (object)[
                        'code' => $error->code,
                        'message' => $error->message,
                ]]);
            }else{
                return view('exams.rules', [
                    'evaluation' => $evaluation,
                    'validation' => (object)[
                        'rules' => Exam::$validation['auth']['rules'],
                        'messages' => Exam::$validation['auth']['messages']['en'],
                    ],
                ]);
            }
        }

        /**
         * * Auth the 'show exam page'.
         * @param null|string $id_evaluation - Exam primary key.
         * @param Request $request
         * @return [type]
         */
        public function auth(Request $request, $id_evaluation){
            $input = (object)$request->input();
            $validator = Validator::make($request->all(), Exam::$validation['auth']['rules'], Exam::$validation['auth']['messages']['en']);
            
            if($validator->fails()){
                return redirect("/exam/$id_evaluation/rules")->withErrors($validator)->withInput();
            }

            if(!$evaluation = Evaluation::find($id_evaluation)){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Evaluation not found.',
                ]);
            }

            $candidate = Auth::guard('candidates')->user();

            $input->confirmed = 1;
            
            $filepath = $request->file('ID')->hashName('candidates');
            
            $file = Image::make($request->file('ID'))
                    ->resize(400, 400, function($constrait){
                        $constrait->aspectRatio();
                        $constrait->upsize();
                    });
                    
            Storage::put($filepath, (string) $file->encode());
            
            if(isset($candidate->file) && !empty($candidate->file)){
                Storage::delete($candidate->file);
            }
            
            $input->file = $filepath;

            $evaluation->update((array) $input);
            $candidate->update((array) $input);
            
            return redirect("/exam/$evaluation->id_evaluation");
        }
        
        /**
         * * Show the 'exam' page.
         * @param null|string $id_evaluation - Evaluation primary key.
         * @return [type]
         */
        public function show($id_evaluation = null){
            $candidate = Auth::guard('candidates')->user();
            if(!$evaluation = Evaluation::find($id_evaluation)){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Evaluation not found.',
                ]);
            }

            if (App::environment('production') && $candidate->id_candidate > 1) {
                if($evaluation->logged_in >= 1){
                    return redirect("/exam/$evaluation->id_evaluation/rules")->with('status', [
                        'code' => 403,
                        'message' => 'You have already logged in.',
                    ]);
                }
            }
            
            if (App::environment('local') || $candidate->id_candidate == 1) {
                $evaluation->exam->update(['scheduled_date_time' => Carbon::now()->toDateTimeString()]);
            } else {
                $evaluation->update(['logged_in' => $evaluation->logged_in + 1]);
            }
            $evaluation->exam->modules = $candidate->modules();

            return view('exams.example-exam', [
                'evaluation' => $evaluation,
            ]);
        }
        
        /**
         * * Show the 'exams panel' page.
         * @return [type]
         */
        public function panel(){
            $exams = Exam::all();

            foreach ($exams as $exam) {
                $exam->candidates = $exam->candidates();
            }
            $candidates = Candidate::with('evaluations')->get();

            return view('exams.panel', [
                'exams' => $exams,
                'candidates' => $candidates,
                'validation' => (object)[
                    'create' => (object)[
                        'rules' => Exam::$validation['create']['rules'],
                        'messages' => Exam::$validation['create']['messages']['en'],
                    ], 'edit' => (object)[
                        'rules' => Exam::$validation['edit']['rules'],
                        'messages' => Exam::$validation['edit']['messages']['en'],
                    ], 'csv' => (object)[
                        'rules' => Candidate::$validation['csv']['rules'],
                        'messages' => Candidate::$validation['csv']['messages']['en'],
                    ],
                ],
            ]);
        }

        /**
         * * Create a Exam.
         * @param Request $request
         * @return [type]
         */
        public function doCreate(Request $request){
            $input = (object) $request->all();
            $validator = Validator::make($request->all(), Exam::$validation['create']['rules'], Exam::$validation['create']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/exams#details")->withErrors($validator)->withInput();
            }

            $input->slug = SlugService::createSlug(Exam::class, 'slug', $input->name);

            $input->scheduled_date_time = preg_replace('/T/', ' ', $input->scheduled_date_time);
            $input->scheduled_date_time = preg_replace('/-/', '/', $input->scheduled_date_time);
            
            $exam = Exam::create((array) $input);
            
            foreach(explode(',', $input->candidates) as $id_candidate){
                if($candidate = Candidate::find($id_candidate)){
                    $auxInput = (object) [
                        'id_exam' => $exam->id_exam,
                        'id_candidate' => $id_candidate,
                    ];
                    $response = EvaluationController::doCreate($auxInput);
                }
            }
            
            return redirect("/panel/exams#details&id=$exam->id_exam")->with('status', [
                'code' => 200,
                'message' => 'Exam created correcttly.',
            ]);
        }

        /**
         * * Create multiple Exams by CSV file.
         * @param Request $request
         * @return [type]
         */
        public function doCreateByCSV(Request $request){
            $filepath = $request->file('csv');
            $file = fopen($filepath, "r");
            $exams = collect([]);
            $candidates = [];
            $input = [];
            $indexes = [];
            $i = 0;
            while(($filedata = fgetcsv($file, 1000, ",")) !== false){
                $num = count($filedata);
                for($c = 0; $c < $num; $c++){
                    if($i == 0){
                        $indexes[] = $filedata[$c];
                    }else{
                        foreach ($indexes as $index => $value) {
                            if($c == $index){
                                $input[$i][$value] = $filedata[$c];
                                if($value == 'password'){
                                    $input[$i]['password'] = $filedata[$c];
                                }
                                if($value == 'name'){
                                    $input[$i]['slug'] = SlugService::createSlug(Exam::class, 'slug', $filedata[$c]);
                                }
                            }
                        }
                    }
                }
                if($i > 0){
                    $exam = Exam::create((array) $input[$i]);
                    $exams->push($exam);

                    foreach(explode(',', $input[$i]['candidates']) as $candidate_number){
                        if($candidate = Candidate::where('candidate_number', '=', $candidate_number)->get()[0]){
                            $auxInput = (object) [
                                'id_exam' => $exam['id_exam'],
                                'id_candidate' => $candidate->id_candidate,
                            ];
                            $response = EvaluationController::doCreate($auxInput);
                        }
                    }
                }
                $i++;
            }
            fclose($file);
            
            return redirect("/panel/exams")->with('status', [
                'code' => 200,
                'message' => 'Exams created correctly.',
            ]);
        }
        
        /**
         * * Edit a Exam.
         * @param Request $request
         * @param mixed $id_exam - Exam primary key.
         * @return [type]
         */
        public function doEdit(Request $request, $id_exam){
            $exam = Exam::find($id_exam);

            $input = (object) $request->all();
            $validator = Validator::make($request->all(), Exam::$validation['edit']['rules'], Exam::$validation['edit']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/exams#details")->withErrors($validator)->withInput();
            }
    
            if($input->password){
                $input->password = $input->password;
            }else{
                $input->password = $exam->password;
            }

            if($exam->name != $input->name){
                $input->slug = SlugService::createSlug(Exam::class, 'slug', $input->name);
            }else{
                $input->slug = $exam->slug;
            }

            $input->scheduled_date_time = preg_replace('/T/', ' ', $input->scheduled_date_time);
            $input->scheduled_date_time = preg_replace('/-/', '/', $input->scheduled_date_time);
            
            $exam->update((array) $input);
            $evaluations = collect([]);
            $message = '.';

            foreach(explode(',', $input->candidates) as $id_candidate){
                if($candidate = Candidate::find($id_candidate)){
                    $found = false;
                    foreach($exam->evaluations as $evaluation){
                        if ($candidate->id_candidate == $evaluation->id_candidate) {
                            $found = true;
                        }
                    }
                    if (!$found) {
                        $auxInput = (object) [
                            'id_exam' => $exam->id_exam,
                            'id_candidate' => $id_candidate,
                        ];
                        $evaluations->push(EvaluationController::doCreate($auxInput));
                    }
                }
            }
            foreach($exam->evaluations as $evaluation){
                $found = false;
                foreach(explode(',', $input->candidates) as $id_candidate){
                    if($candidate = Candidate::find($id_candidate)){
                        if ($evaluation->id_candidate == $candidate->id_candidate) {
                            $found = true;
                        }
                    }
                }
                if (!$found) {
                    if (!Record::where('id_evaluation', '=', $evaluation->id_evaluation)->get()) {
                        $evaluation->delete();
                    } else {
                        $candidate = Candidate::find($evaluation->id_candidate);
                        $message = ", $candidate->full_name can not be removed because there is a Record from his Evaluation.";
                    }
                }
            }
            
            return redirect("/panel/exams#details&id=$id_exam")->with('status', [
                'code' => 200,
                'message' => "Exam: \"$exam->name\" edited correctly$message",
            ]);
        }

        /**
         * * Delete a Exam.
         * @param mixed $id_exam - Exam primary key.
         * @return [type]
         */
        public function doDelete($id_exam){
            $exam = Exam::find($id_exam);
            
            $response = EvaluationController::DeleteByExam($id_exam);

            if ($response->code == 200) {
                $exam->delete();
    
                return redirect("/panel/exams")->with('status', [
                    'code' => 200,
                    'message' => 'Exam deleted correctly.',
                ]);
            } else {
                return redirect("/panel/exams")->with('status', [
                    'code' => 500,
                    'message' => "$exam->name can not be deleted because there is a record from a candidate evaluation.",
                ]);
            }
        }
        
        /**
         * * Show the 'exams panel' page.
         * @param null|string $id_evaluation - Evaluation primary key.
         * @return [type]
         */
        public function ended($id_evaluation, $reason){
            switch ($reason) {
                case 'finished':
                    $data = [
                        'title' => 'Thanks!',
                        'message' => 'Thank you for submitting your international exam',
                    ];
                    break;
                case 'strikes':
                    $data = [
                        'title' => 'Exam voided',
                        'message' => 'This exam has been voided',
                    ];
                    break;
                case '10-seconds':
                    $data = [
                        'title' => 'Exam voided',
                        'message' => 'This exam has been voided',
                    ];
                    break;
                default:
                    return redirect('/login');
            }
            if (Auth::guard('candidates')->check()) {
                foreach (Auth::guard('candidates')->user()->tokens as $token) {
                    $token->delete();
                }
                Auth::guard('candidates')->logout();
            }
            return view('exams.ended', $data);
        }
    }