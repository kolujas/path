<?php
    namespace App\Http\Controllers;

    use App\Models\Candidate;
    use App\Models\Exam;
    use App\Models\Module;
    use Auth;
    use Cviebrock\EloquentSluggable\Services\SlugService;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

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
            $candidates = Candidate::all();
            return view('exams.panel', [
                'exams' => $exams,
                'candidates' => $candidates,
                'validation' => (object)[
                    'rules' => Exam::$validation['create']['rules'],
                    'messages' => Exam::$validation['create']['messages']['en'],
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
            $validator = Validator::make($request->all(), $this->replaceString(Exam::$validation['edit']['rules'], "({[a-z_]*})", $id_exam), Exam::$validation['edit']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/exams#details?id=$id_exam")->withErrors($validator)->withInput();
            }
    
            if(isset($input->password)){
                $input->password = \Hash::make($input->password);
            }else{
                $input->password = $exam->password;
            }

            if($exam->name != $input->name){
                $input->slug = SlugService::createSlug(Exam::class, 'slug', $input->name);
            }else{
                $input->slug = $exam->slug;
            }
            
            $exam->update((array) $input);
            
            return redirect("/panel/exams#details&id=$id_exam")->with('status', [
                'code' => 200,
                'message' => "Exam: \"$exam->name\" edited correctly.",
            ]);
        }

        /**
         * * Delete a Exam.
         * @param mixed $id_exam - Exam primary key.
         * @return [type]
         */
        public function doEliminar($id_exam){
            $exam = Exam::find($id_exam);
                
            $exam->delete();
            
            return redirect()->route('web.panel')->with('status', [
                'code' => 200,
                'message' => "Exam deleted correctly.",
            ]);
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