<?php
    namespace App\Http\Controllers;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use Illuminate\Http\Request;

    class EvaluationController extends Controller{
        /**
         * * Delete a Evaluation by a Candidate.
         * @static
         * @param mixed $id_candidate - Candidate primary key.
         * @return [type]
         */
        static public function DeleteByCandidate($id_candidate){
            $evaluations = Evaluation::where('id_candidate', '=', $id_candidate)->get();
            
            foreach ($evaluations as $evaluation) {
                $evaluation->delete();
            }
            
            return [
                'code' => 200,
                'message' => 'Evaluation deleted correctly.',
            ];
        }

        /**
         * * Delete a Evaluation by an Exam.
         * @static
         * @param mixed $id_exam - Exam primary key.
         * @return [type]
         */
        static public function DeleteByExam($id_exam){
            $evaluations = Evaluation::where('id_exam', '=', $id_exam)->get();
            
            foreach ($evaluations as $evaluation) {
                $evaluation->delete();
            }
            
            return [
                'code' => 200,
                'message' => 'Evaluation deleted correctly.',
                'data' => [
                    'records' => $records,
                ],
            ];
        }

        /**
         * * Create a Evaluation.
         * @static
         * @param array $input
         * @return [type]
         */
        static public function doCreate($input){
            $evaluation = Evaluation::create((array) $input);

            return [
                'code' => 200,
                'message' => 'Evaluation created correctly.',
                'data' => [
                    'evaluation' => $evaluation,
                ],
            ];
        }
    }