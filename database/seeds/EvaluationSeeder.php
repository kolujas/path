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
                    //
                }

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
                    'id_exam' => 1,
                    'id_candidate' => 8,
                ] );
            }
        }
    }