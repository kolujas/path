<?php
    namespace App\Http\Controllers;

    use App\Models\Auth as AuthModel;
    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\User;
    use Auth;
    use Carbon\Carbon;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Session;
    use Illuminate\Support\Facades\Validator;

    class AuthController extends Controller{
        /**
         * * Show the 'log in' page.
         * @param Request $request
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
                    $candidate = Auth::guard('candidates')->user();
                    $evaluation = Evaluation::where('id_candidate', '=', $candidate->id_candidate)->get();
                    $evaluation = $evaluation[0];
                    return redirect("/exam/$evaluation->id_evaluation/rules");
                case 'users':
                    return redirect("/panel/candidates");
                default:
                    if($request->session()->has('error')){
                        $error = (object) $request->session()->pull('error');
                        return view('auth.login', [
                            'validation' => (object)[
                                'rules' => AuthModel::$validation['login']['rules'],
                                'messages' => AuthModel::$validation['login']['messages']['en'],
                            ], 'status' => (object)[
                                'code' => $error->code,
                                'message' => $error->message,
                        ]]);
                    }else{
                        return view('auth.login', [
                            'validation' => (object)[
                                'rules' => AuthModel::$validation['login']['rules'],
                                'messages' => AuthModel::$validation['login']['messages']['en'],
                            ],
                        ]);
                    }
            }
        }

        /**
         * * Log the User in.
         * @param Request $request
         * @return [type]
         */
        public function doLogIn(Request $request){
            $input = (object)$request->input();
            $validator = Validator::make( $request->all(), AuthModel::$validation['login']['rules'], AuthModel::$validation['login']['messages']['en'] );
            if($validator->fails()){
                return redirect()->route('auth.showLogin')->withErrors($validator)->withInput();
            }

            if(Auth::attempt(['password' => $input->password, 'email' => $input->data], true)){
                return redirect()->route('candidate.panel')->with('status', [
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
            $exam->update(['scheduled_date_time' => Carbon::now()->addSeconds(15)->toDateTimeString()]);
            Auth::guard('candidates')->login($candidate, true);
            return redirect("exam/$evaluation->id_evaluation/rules");
        }

        /**
         * * Log the User out.
         * @param Request $request
         * @return [type]
         */
        public function doLogOut(Request $request) {
            if(Auth::guard('candidates')->check()){
                $authenticated = 'candidates';
            }else if(Auth::guard('web')->check()){
                $authenticated = 'users';
            }else{
                $authenticated = false;
            }
            switch ($authenticated) {
                case 'candidates':
                    foreach (Auth::guard('candidates')->user()->tokens as $token) {
                        $token->delete();
                    }
                    Auth::guard('candidates')->logout();
                    break;
                case 'users':
                    foreach (Auth::user()->tokens as $token) {
                        $token->delete();
                    }
                    Auth::logout();
                    break;
            }
            if($request->session()->has('error')){
                $error = (object) $request->session()->pull('error');
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => $error->code,
                    'message' => $error->message,
                ] );
            }else{
                return redirect()->route('auth.showLogin')->with('status', [
                    'code' => 200,
                    'message' => 'Session ended.',
                ] );
            }
        }
    }