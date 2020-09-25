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
                    # code...
                }
            } else {
                Candidate::create( [
                    'candidate_number' => 1,
                    'full_name' => 'Pepe Diaz',
                    'email' => 'nosoybatman@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Wayne Enterprises',
                    'modules' => 'A1:listening,A1:writing',
                    'password' => \Hash::make( '12345678' ),
                    'slug' => 'pepe-diaz',
                ] );
            }
        }
    }