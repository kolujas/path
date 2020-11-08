<?php
    namespace App\Http\Controllers\API;

    use App\Models\Evaluation;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class EvaluationController extends Controller{
        public function get(Request $request, $id_evaluation){
            if (!$evaluation = Evaluation::find($id_evaluation)) {
                return response()->json([
                    'code' => 404,
                    'message' => 'Evaluation not found.',
                    'data' => [],
                ]);
            }

            $evaluation->exam;

            if ($evaluation->id_candidate != $request->user()->id_candidate) {
                return response()->json([
                    'code' => 403,
                    'message' => 'You have not this evaluation.',
                    'data' => [],
                ]);
            }
            
            $evaluation->exam->modules = $request->user()->modules();

            return response()->json([
                'code' => 200,
                'data' => [
                    'evaluation' => $evaluation,
                ],
            ]);
        }
    }