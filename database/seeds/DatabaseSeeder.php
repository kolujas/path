<?php
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder {
        /**
         * Seed the application's database.
         *
         * @return void
         */
        public function run() {
            $this->call(EvaluationSeeder::class);
            $this->call(ExamSeeder::class);
            $this->call(ModuleSeeder::class);
            $this->call(RecordSeeder::class);
            $this->call(StudentSeeder::class);
            $this->call(UserSeeder::class);
        }
    }