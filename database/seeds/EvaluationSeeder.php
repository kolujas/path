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
                    # code...
                }
            } else {
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 1,
                ] );
            }
        }
    }