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
                    if ($candidate->id_candidate == 5) {
                        $candidate->update(['modules' => 'A2 Preliminary:L,A2 Preliminary:W',]);
                    } else if ($candidate->id_candidate == 6) {
                        $candidate->update(['modules' => 'A2 Elementary:L,A2 Elementary:W',]);
                    }
                }
            } else {
                Candidate::create( [
                    'candidate_number' => 1,
                    'full_name' => 'Pepe Diaz',
                    'email' => 'nosoybatman@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Wayne Enterprises',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'pepe-diaz',
                ] );
                Candidate::create( [
                    'candidate_number' => 2,
                    'full_name' => 'Manolo Gomez',
                    'email' => 'solomanolo@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Belen\'s barquito',
                    'modules' => 'A1 Entry:L,A1 Entry:W',
                    'slug' => 'manolo-gomez',
                ] );
                Candidate::create( [
                    'candidate_number' => 3,
                    'full_name' => 'Antonio Gutierrez',
                    'email' => 'elmamejo@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Only Pros',
                    'modules' => 'A1 Access:L,A1 Access:W',
                    'slug' => 'antonio-gutierrez',
                ] );
                Candidate::create( [
                    'candidate_number' => 4,
                    'full_name' => 'Lola Lopez',
                    'email' => 'lolalinda@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Beauty Asociados',
                    'modules' => 'A1 Achiever:L,A1 Achiever:W',
                    'slug' => 'lola-lopez',
                ] );
                Candidate::create( [
                    'candidate_number' => 5,
                    'full_name' => 'Héctor Image',
                    'email' => 'altaimagenfachera@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Hector\'s House',
                    'modules' => 'A2 Preliminary:L,A2 Preliminary:W',
                    'slug' => 'hector-image',
                ] );
                Candidate::create( [
                    'candidate_number' => 6,
                    'full_name' => 'Pepe Diaz',
                    'email' => 'correo-1@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Wayne Enterprises',
                    'modules' => 'A2 Elementary:L,A2 Elementary:W',
                    'slug' => 'pepe-diaz',
                ] );
                Candidate::create( [
                    'candidate_number' => 7,
                    'full_name' => 'Manolo Gomez',
                    'email' => 'correo-2@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Belen\'s barquito',
                    'modules' => 'B1 Progress:L,B1 Progress:W',
                    'slug' => 'manolo-gomez',
                ] );
                Candidate::create( [
                    'candidate_number' => 8,
                    'full_name' => 'Antonio Gutierrez',
                    'email' => 'correo-3@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Only Pros',
                    'modules' => 'B2 Competency:L,B2 Competency:W',
                    'slug' => 'antonio-gutierrez',
                    'file' => 'candidates/1.png',
                ] );
                Candidate::create( [
                    'candidate_number' => 9,
                    'full_name' => 'Example Candidate',
                    'email' => 'ejemplo@correo.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Path',
                    'modules' => 'A1 Entry:L,B2 Competency:W',
                    'slug' => 'example-candidate',
                ] );
            }
        }
    }