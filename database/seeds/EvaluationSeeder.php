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
                    if ($evaluation->id_evaluation == 10) {
                        $evaluation->update(['logged_in' => 1]);
                    }
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
                Evaluation::create( [
                    'id_exam' => 2,
                    'id_candidate' => 9,
                ] );
                Evaluation::create( [
                    'id_exam' => 1,
                    'id_candidate' => 10,
                    'id_status' => 1,
                    'logged_in' => 1,
                ] );
            }
        }
    }