<?php
    namespace App\Http\Controllers;

    use App\Models\Exam;
    use Carbon\Carbon;
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
            ]);
        }

        /**
         * * Auth the 'show exam page'.
         * @param null|string $id_exam - Exam primary key.
         * @return [type]
         */
        public function auth(Request $request, $id_exam = null){
            $input = (object)$request->input();
            $validator = Validator::make( $request->all(), Exam::$validation['auth']['rules'], Exam::$validation['auth']['messages']['en'] );
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
            if(!Exam::find($id_exam)){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Exam not found.',
                ]);
            }

            return view('exams.example-exam', [
                //
            ]);
        }
    }