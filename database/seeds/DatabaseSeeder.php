<?php
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run() {
            $this->call(CandidateSeeder::class);
            $this->call(EvaluationSeeder::class);
            $this->call(ExamSeeder::class);
            $this->call(UserSeeder::class);
        }
    }