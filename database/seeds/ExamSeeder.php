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
                    'name' => 'Example exam 1',
                    'rules' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit facilis illo sunt dolor sit nisi maiores porro asperiores doloribus totam explicabo impedit voluptatum delectus, tenetur velit! Cum ipsum nam reiciendis labore quibusdam quis?',
                    'password' => \Hash::make( '12345678' ),
                    'scheduled_date_time' => '2022-01-01 12:00:00',
                    'slug' => 'example-exam-1',
                ] );
            }
        }
    }