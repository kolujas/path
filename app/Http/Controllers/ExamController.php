<?php
    namespace App\Http\Controllers;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\Module;
    use Auth;
    use Cviebrock\EloquentSluggable\Services\SlugService;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Intervention\Image\ImageManagerStatic as Image;
    use Storage;

    class ExamController extends Controller{
        /**
         * * Show the 'exam rules' page.
         * @param null|string $id_exam - Exam primary key.
         * @return [type]
         */
        public function rules($id_exam = null){
            if(!$exam = Exam::find($id_exam)){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Exam not found.',
                ]);
            }

            return view('exams.rules', [
                'exam' => $exam,
                'validation' => (object)[
                    'rules' => Exam::$validation['auth']['rules'],
                    'messages' => Exam::$validation['auth']['messages']['en'],
                ],
            ]);
        }

        /**
         * * Auth the 'show exam page'.
         * @param null|string $id_exam - Exam primary key.
         * @return [type]
         */
        public function auth(Request $request, $id_exam = null){
            $input = (object)$request->input();
            $validator = Validator::make($request->all(), Exam::$validation['auth']['rules'], Exam::$validation['auth']['messages']['en']);
            if($validator->fails()){
                return redirect("/exam/$id_exam/rules")->withErrors($validator)->withInput();
            }

            if(!$exam = Exam::find($id_exam)){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Exam not found.',
                ]);
            }

            $candidate = Auth::guard('candidates')->user();

            if(!$evaluation = Evaluation::where([['id_exam', '=', $id_exam], ['id_candidate', '=', $candidate->id_candidate]])->get()){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Evaluation not found.',
                ]);
            }
            $evaluation = $evaluation[0];

            $input->confirmed = 1;
            
            $filepath = $request->file('ID')->hashName('candidates');
            
            $file = Image::make($request->file('ID'))
                    ->resize(400, 400, function($constrait){
                        $constrait->aspectRatio();
                        $constrait->upsize();
                    });
                    
            Storage::put($filepath, (string) $file->encode());
            
            $input->file = $filepath;

            $evaluation->update((array) $input);
            $candidate->update((array) $input);
            
            return redirect("/exam/$id_exam");
        }
        
        /**
         * * Show the 'exam' page.
         * @param null|string $id_exam - Exam primary key.
         * @return [type]
         */
        public function show($id_exam = null){
            if(!$exam = Exam::find($id_exam)){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Exam not found.',
                ]);
            }
            
            $candidate = Auth::guard('candidates')->user();
            $exam->modules = $candidate->modules();

            return view('exams.example-exam', [
                'exam' => $exam,
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
    
            $input->password = \Hash::make($input->password);

            $input->slug = SlugService::createSlug(Exam::class, 'slug', $input->name);
            
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
                $input->password = \Hash::make($input->password);
            }else{
                $input->password = $exam->password;
            }

            if($exam->name != $input->name){
                $input->slug = SlugService::createSlug(User::class, 'slug', $input->name);
            }else{
                $input->slug = $exam->slug;
            }
            
            $exam->update((array) $input);

            try {
                $response = EvaluationController::DeleteByExam($id_exam);
            
                foreach(explode(',', $input->candidates) as $id_candidate){
                    if($candidate = Candidate::find($id_candidate)){
                        $auxInput = (object) [
                            'id_exam' => $exam->id_exam,
                            'id_candidate' => $id_candidate,
                        ];
                        $evaluation = EvaluationController::doCreate($auxInput);
                    }
                }
                
                return redirect("/panel/exams#details&id=$id_exam")->with('status', [
                    'code' => 200,
                    'message' => "Exam: \"$exam->name\" edited correctly.",
                ]);
            } catch (\Throwable $th) {
                dd($th);
            }
        }

        /**
         * * Delete a Exam.
         * @param mixed $id_exam - Exam primary key.
         * @return [type]
         */
        public function doDelete($id_exam){
            $exam = Exam::find($id_exam);
            
            $exam->delete();

            try {
                $response = EvaluationController::DeleteByExam($id_exam);

                return redirect("/panel/exams")->with('status', [
                    'code' => 200,
                    'message' => 'Exam deleted correctly.',
                ]);
            } catch (\Throwable $th) {
                dd($th);
            }
        }
        
        /**
         * * Show the 'exams panel' page.
         * @param null|string $id_exam - Exam primary key.
         * @return [type]
         */
        public function finished($id_exam){
            return view('exams.finished', [
                //
            ]);
        }
    }