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
                    'full_name' => 'Entry Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Path',
                    'modules' => 'A1- Entry:L,A1- Entry:RW',
                    'slug' => 'entry-candidate',
                ] );
                Candidate::create( [
                    'candidate_number' => 2,
                    'full_name' => 'Access Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 2,
                    'member' => 'Path',
                    'modules' => 'A1 Access:L,A1 Access:RW',
                    'slug' => 'access-candidate',
                ] );
                Candidate::create( [
                    'candidate_number' => 3,
                    'full_name' => 'Achiever Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 3,
                    'member' => 'Path',
                    'modules' => 'A1+ Achiever:L,A1+ Achiever:RW',
                    'slug' => 'achiever-candidate',
                ] );
                Candidate::create( [
                    'candidate_number' => 4,
                    'full_name' => 'Preliminary Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 4,
                    'member' => 'Path',
                    'modules' => 'A2 Preliminary:L,A2 Preliminary:RW',
                    'slug' => 'preliminary-candidate',
                ] );
                Candidate::create( [
                    'candidate_number' => 5,
                    'full_name' => 'Elementary Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 5,
                    'member' => 'Path',
                    'modules' => 'A2+ Elementary:L,A2+ Elementary:RW',
                    'slug' => 'elementary-candidate',
                ] );
                Candidate::create( [
                    'candidate_number' => 6,
                    'full_name' => 'Progress Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 6,
                    'member' => 'Path',
                    'modules' => 'B1 Progress:L,B1 Progress:RW',
                    'slug' => 'progress-candidate',
                ] );
                Candidate::create( [
                    'candidate_number' => 7,
                    'full_name' => 'Competency Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 7,
                    'member' => 'Path',
                    'modules' => 'B2 Competency:L,B2 Competency:RW',
                    'slug' => 'competency-candidate',
                ] );
                Candidate::create( [
                    'candidate_number' => 8,
                    'full_name' => 'Mixed Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 8,
                    'member' => 'Path',
                    'modules' => 'A1- Entry:L,B2 Competency:RW',
                    'slug' => 'mixed-candidate',
                ] );
                Candidate::create( [
                    'candidate_number' => 9,
                    'full_name' => 'Candidate who has finished his exam',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 9,
                    'member' => 'Path',
                    'modules' => 'B1 Progress:L,A1+ Achiever:RW',
                    'slug' => 'candidate-who-has-finished-his-exam',
                    'file' => 'candidates/1.png',
                ] );
                Candidate::create( [
                    'candidate_number' => 10,
                    'full_name' => 'DEMO exam Candidate',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 10,
                    'member' => 'Path',
                    'modules' => 'DEMO:L,DEMO:RW',
                    'slug' => 'demo-exam-candidate',
                ] );
            }
        }
    }