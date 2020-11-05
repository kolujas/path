<?php
    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use App\Models\Auth as AuthModel;
    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class AuthController extends Controller{
        /**
         * * Log the User in.
         * @param Request $request
         * @return [type]
         */
        public function doLogIn(Request $request){
            $input = (object) $request->input();
            $validator = Validator::make($request->all(), AuthModel::$validation['login']['rules'], AuthModel::$validation['login']['messages']['en']);
            if($validator->fails()){
                return response()->json([
                    'code' => 404,
                    'data' => $validator->errors()->messages(),
                    'message' => 'Authentication error.',
                ]);
            }

            if(!$candidate = Candidate::where('candidate_number', '=', $input->data)->get()){
                return redirect()->json([
                    'code' => 404,
                    'message' => 'Incorrect candidate number.',
                ]);
            }
            $candidate = $candidate[0];

            $evaluation = Evaluation::where('id_candidate', '=', $candidate->id_candidate)->get();
            $evaluation = $evaluation[0];

            $exam = Exam::find($evaluation->id_exam);
            if(!(\Hash::check($input->password, $exam->password))){
                return redirect()->json([
                    'code' => 404,
                    'message' => 'Exam not found.',
                ]);
            }

            Auth::guard('candidates')->login($candidate, true);
            $candidate = Auth::guard('candidates')->user();
            $candidate->token =  $candidate->createToken('Path Access Token', ['candidates_api'])->accessToken;

            return response()->json([
                'code' => 200,
                'message' => 'Session started.',
                'data' => $candidate->token,
            ]);
        }
    }