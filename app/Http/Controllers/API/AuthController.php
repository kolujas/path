<?php
    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use App\Models\Auth as AuthModel;
    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use Auth;
    use Illuminate\Http\Request;

    class AuthController extends Controller{
        /**
         * * Log the User.
         * @param Request $request
         * @return [type]
         */
        public function doIngresar(Request $request){
            $input = (object) $request->input();
            $validator = Validator::make($request->all(), AuthModel::$validation['login']['rules'], AuthModel::$validation['login']['messages']['es']);
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
                return redirect()->json([
                    'code' => 404,
                    'message' => 'Exam not found.',
                ]);
            }

            Auth::guard('candidates')->login($candidate, true);
            $candidate = Auth::guard('candidates')->user();
            $candidate->token =  $candidate->createToken('path_candidate')->accessToken;

            return response()->json([
                'code' => 200,
                'message' => 'Session started.',
                'data' => $candidate->token,
            ]);
        }
    }