<?php
    use App\Models\Student;
    use Illuminate\Database\Seeder;

    class StudentSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            $students = Student::get();
            if ( count( $students ) ) {
                foreach ($students as $student) {
                    # code...
                }
            } else {
                Student::create( [
                    'id_user' => 1,
                    'id_exam' => 1,
                ] );
                Student::create( [
                    'id_user' => 2,
                    'id_exam' => 1,
                ] );
            }
        }
    }