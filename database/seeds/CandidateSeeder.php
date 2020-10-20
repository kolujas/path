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
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'manolo-gomez',
                ] );
                Candidate::create( [
                    'candidate_number' => 3,
                    'full_name' => 'Antonio Gutierrez',
                    'email' => 'elmamejo@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Only Pros',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'antonio-gutierrez',
                ] );
                Candidate::create( [
                    'candidate_number' => 4,
                    'full_name' => 'Lola Lopez',
                    'email' => 'lolalinda@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Beauty Asociados',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'lola-lopez',
                ] );
                Candidate::create( [
                    'candidate_number' => 5,
                    'full_name' => 'Héctor Image',
                    'email' => 'altaimagenfachera@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Hector\'s House',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'hector-image',
                ] );
                Candidate::create( [
                    'candidate_number' => 6,
                    'full_name' => 'Pepe Diaz',
                    'email' => 'correo-1@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Wayne Enterprises',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'pepe-diaz',
                ] );
                Candidate::create( [
                    'candidate_number' => 7,
                    'full_name' => 'Manolo Gomez',
                    'email' => 'correo-2@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Belen\'s barquito',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'manolo-gomez',
                ] );
                Candidate::create( [
                    'candidate_number' => 8,
                    'full_name' => 'Antonio Gutierrez',
                    'email' => 'correo-3@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Only Pros',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'antonio-gutierrez',
                    'file' => 'candidates/1.png',
                ] );
                Candidate::create( [
                    'candidate_number' => 9,
                    'full_name' => 'Lola Lopez',
                    'email' => 'correo-4@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Beauty Asociados',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'lola-lopez',
                    'file' => 'candidates/1.png',
                ] );
                Candidate::create( [
                    'candidate_number' => 10,
                    'full_name' => 'Héctor Image',
                    'email' => 'correo-5@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Hector\'s House',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'hector-image',
                    'file' => 'candidates/1.png',
                ] );
                Candidate::create( [
                    'candidate_number' => 11,
                    'full_name' => 'Pepe Diaz',
                    'email' => 'correo-6@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Wayne Enterprises',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'pepe-diaz',
                    'file' => 'candidates/1.png',
                ] );
                Candidate::create( [
                    'candidate_number' => 12,
                    'full_name' => 'Manolo Gomez',
                    'email' => 'correo-7@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Belen\'s barquito',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'manolo-gomez',
                ] );
                Candidate::create( [
                    'candidate_number' => 13,
                    'full_name' => 'Antonio Gutierrez',
                    'email' => 'correo-8@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Only Pros',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'antonio-gutierrez',
                ] );
                Candidate::create( [
                    'candidate_number' => 14,
                    'full_name' => 'Lola Lopez',
                    'email' => 'correo-9@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Beauty Asociados',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'lola-lopez',
                ] );
                Candidate::create( [
                    'candidate_number' => 15,
                    'full_name' => 'Héctor Image',
                    'email' => 'correo-10@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Hector\'s House',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'hector-image',
                ] );
                Candidate::create( [
                    'candidate_number' => 16,
                    'full_name' => 'Pepe Diaz',
                    'email' => 'correo-11@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Wayne Enterprises',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'pepe-diaz',
                ] );
                Candidate::create( [
                    'candidate_number' => 17,
                    'full_name' => 'Manolo Gomez',
                    'email' => 'correo-12@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Belen\'s barquito',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'manolo-gomez',
                ] );
                Candidate::create( [
                    'candidate_number' => 18,
                    'full_name' => 'Antonio Gutierrez',
                    'email' => 'correo-13@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Only Pros',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'antonio-gutierrez',
                ] );
                Candidate::create( [
                    'candidate_number' => 19,
                    'full_name' => 'Lola Lopez',
                    'email' => 'correo-14@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Beauty Asociados',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'lola-lopez',
                ] );
                Candidate::create( [
                    'candidate_number' => 20,
                    'full_name' => 'Héctor Image',
                    'email' => 'correo-15@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Hector\'s House',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'hector-image',
                ] );
                Candidate::create( [
                    'candidate_number' => 21,
                    'full_name' => 'Pepe Diaz',
                    'email' => 'correo-16@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Wayne Enterprises',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'pepe-diaz',
                ] );
                Candidate::create( [
                    'candidate_number' => 22,
                    'full_name' => 'Manolo Gomez',
                    'email' => 'correo-17@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Belen\'s barquito',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'manolo-gomez',
                ] );
                Candidate::create( [
                    'candidate_number' => 23,
                    'full_name' => 'Antonio Gutierrez',
                    'email' => 'correo-18@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Only Pros',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'antonio-gutierrez',
                ] );
                Candidate::create( [
                    'candidate_number' => 24,
                    'full_name' => 'Lola Lopez',
                    'email' => 'correo-19@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Beauty Asociados',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'lola-lopez',
                ] );
                Candidate::create( [
                    'candidate_number' => 25,
                    'full_name' => 'Héctor Image',
                    'email' => 'correo-20@gmail.com',
                    'date_of_birth' => '1997-08-12',
                    'id_member' => 1,
                    'member' => 'Hector\'s House',
                    'modules' => 'A1:L,A1:W',
                    'slug' => 'hector-image',
                ] );
            }
        }
    }