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
                    $exam->update([
                        'rules' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit facilis illo sunt dolor sit nisi maiores porro asperiores doloribus totam explicabo impedit voluptatum delectus, tenetur velit! Cum ipsum nam reiciendis labore quibusdam quis?',
                    ]);
                }
            } else {
                Exam::create( [
                    'name' => 'Example exam 1',
                    'rules' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit facilis illo sunt dolor sit nisi maiores porro asperiores doloribus totam explicabo impedit voluptatum delectus, tenetur velit! Cum ipsum nam reiciendis labore quibusdam quis?',
                    'password' => \Hash::make( '12345678' ),
                    'scheduled_date_time' => '2022-01-01 12:00:00',
                    'slug' => 'example-exam-1',
                ] );
                Exam::create( [
                    'name' => 'Example exam 2',
                    'rules' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit facilis illo sunt dolor sit nisi maiores porro asperiores doloribus totam explicabo impedit voluptatum delectus, tenetur velit! Cum ipsum nam reiciendis labore quibusdam quis?',
                    'password' => \Hash::make( '12345678' ),
                    'scheduled_date_time' => '2020-02-23 12:00:00',
                    'slug' => 'example-exam-2',
                ] );
                Exam::create( [
                    'name' => 'Example exam 3',
                    'rules' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit facilis illo sunt dolor sit nisi maiores porro asperiores doloribus totam explicabo impedit voluptatum delectus, tenetur velit! Cum ipsum nam reiciendis labore quibusdam quis?',
                    'password' => \Hash::make( '12345678' ),
                    'scheduled_date_time' => '2021-11-04 12:00:00',
                    'slug' => 'example-exam-3',
                ] );
            }
        }
    }