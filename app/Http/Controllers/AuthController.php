<?php
    namespace App\Http\Controllers;

    use App\Models\Exam;
    use App\Models\Student;
    use App\User;
    use Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Validator;

    class AuthController extends Controller{
        /**
         * * Show the 'log in' page.
         * @return [type]
         */
        public function showLogin(Request $request){
            if(!Auth::user()){
                return view('auth.login', [
                    //
                ]);
            }else{
                dd(Auth::user());
            }
        }

        /**
         * * Log the User in.
         * @return [type]
         */
        public function doLogIn(Request $request){
            $input = (object)$request->input();
            $validator = Validator::make( $request->all(), User::$validation['login']['rules'], User::$validation['login']['messages']['en'] );
            if($validator->fails()){
                return redirect()->route('auth.showLogin')->withErrors($validator)->withInput();
            }

            if(Auth::attempt(['password' => $input->password, 'email' => $input->data], true)){
                return redirect()->route('web.panel')->with('status', [
                    'code' => 200,
                    'message' => 'Session started.',
                ] );
            }

            // TODO Preguntar a Juan que opina de la validación especifica.
            if(!User::where( 'candidate_number', '=', $input->data )->get()){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Incorrect user name.',
                ] );
            }

            $user = User::where('candidate_number', '=', $input->data)->get();
            $user = $user[0];
            $students = Student::where('id_user', '=', $user->id_user)->get();

            $found = false;
            foreach ( $students as $student ) {
                $exam = Exam::find($student->id_exam);
                if(\Hash::check($input->password, $exam->password)){
                    $found = true;
                    break;
                }
            }

            if(!$found){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Exam not found.',
                ]);
            }
            
            // TODO Retornar al examen o al usuario (¿Como les gustaría?).
            Auth::login($user, true);
            return redirect("exam/$exam->id_exam")->with('status', [
                'code' => 200,
                'message' => 'Session started.',
            ]);
        }

        /**
         * * Log the User off.
         * @return [type]
         */
        public function doLogOff() {
            Auth::logout();
            return redirect()->route('auth.showLogin')->with('status', [
                'code' => 200,
                'message' => 'Session ended.',
            ] );
        }
    }