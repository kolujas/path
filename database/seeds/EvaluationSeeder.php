<?php
    use App\Models\Evaluation;
    use Illuminate\Database\Seeder;

    class EvaluationSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            $evaluations = Evaluation::get();
            if ( count( $evaluations ) ) {
                foreach ($evaluations as $evaluation) {
                    if($evaluation->id_evaluation == 8 || $evaluation->id_evaluation == 9 || $evaluation->id_evaluation == 10 || $evaluation->id_evaluation == 11){
                        $evaluation->update([
                            'id_status' => 1,
                        ]);
                    }
                }
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 26,
                ] );
            } else {
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 1,
                ] );
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 2,
                ] );
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 3,
                ] );
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 4,
                ] );
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 5,
                ] );
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 6,
                ] );
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 7,
                ] );
                Evaluation::create( [
                    'id_exam' => 2,
                    'id_candidate' => 8,
                    'id_status' => 1,
                ] );
                Evaluation::create( [
                    'id_exam' => 2,
                    'id_candidate' => 9,
                    'id_status' => 1,
                ] );
                Evaluation::create( [
                    'id_exam' => 2,
                    'id_candidate' => 10,
                    'id_status' => 1,
                ] );
                Evaluation::create( [
                    'id_exam' => 2,
                    'id_candidate' => 11,
                    'id_status' => 1,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 12,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 13,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 14,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 15,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 16,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 17,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 18,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 19,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 20,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 21,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 22,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 23,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 24,
                ] );
                Evaluation::create( [
                    'id_exam' => 3,
                    'id_candidate' => 25,
                ] );
            }
        }
    }