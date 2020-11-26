<?php
    use App\Models\Candidate;
    use Illuminate\Database\Seeder;

    class CandidateSeeder extends Seeder{
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run(){
            $candidates = Candidate::get();
            if ( count( $candidates ) ) {
                foreach ($candidates as $candidate) {
                    //
                }
            } else {
                Candidate::create( [
                    'candidate_number' => 1,
                    'full_name' => 'Candidate',
                    'date_of_birth' => '2020-11-25',
                    'id_member' => 1,
                    'member' => 'DEMO',
                    'modules' => 'DEMO:L,DEMO:RW',
                    'slug' => 'candidate',
                ] );
            }
        }
    }