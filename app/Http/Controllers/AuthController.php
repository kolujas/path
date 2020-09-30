<?php
    namespace App\Http\Controllers;

    use App\Models\Auth as AuthModel;
    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
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
            $authenticated = false;
            if(Auth::guard('candidates')->check()){
                $authenticated = 'candidates';
            }else if(Auth::guard('web')->check()){
                $authenticated = 'users';
            }
            switch ($authenticated) {
                case 'candidates':
                    // dd(Auth::guard('candidates')->user());
                    return view('auth.login', [
                        'validation' => (object)[
                            'rules' => AuthModel::$validation['login']['rules'],
                            'messages' => AuthModel::$validation['login']['messages']['en'],
                        ],
                    ]);
                    break;
                case 'users':
                    // dd(Auth::guard('web')->user());
                    return view('auth.login', [
                        'validation' => (object)[
                            'rules' => AuthModel::$validation['login']['rules'],
                            'messages' => AuthModel::$validation['login']['messages']['en'],
                        ],
                    ]);
                    break;
                default:
                    return view('auth.login', [
                        'validation' => (object)[
                            'rules' => AuthModel::$validation['login']['rules'],
                            'messages' => AuthModel::$validation['login']['messages']['en'],
                        ],
                    ]);
                    break;
            }
        }

        /**
         * * Log the User in.
         * @return [type]
         */
        public function doLogIn(Request $request){
            $input = (object)$request->input();
            $validator = Validator::make( $request->all(), AuthModel::$validation['login']['rules'], AuthModel::$validation['login']['messages']['en'] );
            if($validator->fails()){
                return redirect()->route('auth.showLogin')->withErrors($validator)->withInput();
            }

            if(Auth::attempt(['password' => $input->password, 'email' => $input->data], true)){
                return redirect()->route('web.panel')->with('status', [
                    'code' => 200,
                    'message' => 'Session started.',
                ] );
            }

            if(!$candidate = Candidate::where('candidate_number', '=', $input->data)->get()){
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 404,
                    'message' => 'Incorrect candidate number.',
                ] );
            }

            $candidate = $candidate[0];
            $evaluations = Evaluation::where('id_candidate', '=', $candidate->id_candidate)->get();

            $found = false;
            foreach($evaluations as $evaluation){
                $exam = Exam::find($evaluation->id_exam);
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

            Auth::guard('candidates')->login($candidate, true);
            return redirect("exam/$exam->id_exam/rules");
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