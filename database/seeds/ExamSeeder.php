<?php
    use App\Models\Exam;
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
                    # code...
                }
            } else {
                Exam::create( [
                    'name' => 'Example exam',
                    'rules' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit facilis illo sunt dolor sit nisi maiores porro asperiores doloribus totam explicabo impedit voluptatum delectus, tenetur velit! Cum ipsum nam reiciendis labore quibusdam quis? Rerum blanditiis quia laborum quis, nobis dolores, obcaecati pariatur natus corporis nisi perferendis voluptatibus amet. Dicta, culpa dolorum consectetur ex eaque recusandae consequuntur sapiente ipsa excepturi suscipit quidem quae ipsam! Quas quos minus quo ipsa amet incidunt nam, voluptate magni distinctio laboriosam, facilis vel ex voluptatibus nobis maiores reiciendis? Hic molestiae ratione delectus iusto sed error et sequi deleniti veniam in repudiandae aut est atque, repellendus voluptate.',
                    'password' => \Hash::make( '12345678' ),
                    'scheduled_date_time' => '2022-01-01',
                ] );
                Exam::create( [
                    'name' => 'Example exam',
                    'rules' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit facilis illo sunt dolor sit nisi maiores porro asperiores doloribus totam explicabo impedit voluptatum delectus, tenetur velit! Cum ipsum nam reiciendis labore quibusdam quis? Rerum blanditiis quia laborum quis, nobis dolores, obcaecati pariatur natus corporis nisi perferendis voluptatibus amet. Dicta, culpa dolorum consectetur ex eaque recusandae consequuntur sapiente ipsa excepturi suscipit quidem quae ipsam! Quas quos minus quo ipsa amet incidunt nam, voluptate magni distinctio laboriosam, facilis vel ex voluptatibus nobis maiores reiciendis? Hic molestiae ratione delectus iusto sed error et sequi deleniti veniam in repudiandae aut est atque, repellendus voluptate.',
                    'password' => \Hash::make( '12345678' ),
                    'scheduled_date_time' => '2019-01-01',
                ] );
            }
        }
    }