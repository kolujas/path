<?php
    use App\Models\Exam;
    use Carbon\Carbon;
    use Illuminate\Database\Seeder;

    class ExamSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            $exams = Exam::get();
            if ( count( $exams ) ) {
                foreach ($exams as $exam) {
                    //
                }
            } else {
                Exam::create( [
                    'name' => 'Exam',
                    'rules' => 'This exam is an example, just for testing. Right here there will be the exam rules...',
                    'password' => 'JustForTesting',
                    'scheduled_date_time' => '2020-11-25 21:09:00',
                    'slug' => 'exam',
                ] );
            }
        }
    }