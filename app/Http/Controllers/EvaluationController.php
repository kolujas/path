<?php
    namespace App\Http\Controllers;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use Illuminate\Http\Request;

    class EvaluationController extends Controller{
        /**
         * * Delete a Candidate.
         * @static
         * @param mixed $id_candidate - Candidate primary key.
         * @return [type]
         */
        static public function DeleteByCandidate($id_candidate){
            $evaluations = Evaluation::where('id_candidate', '=', $id_candidate)->get();
            
            foreach ($evaluations as $evaluation) {
                $evaluation->delete();
            }
            
            return true;
        }
    }