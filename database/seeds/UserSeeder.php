<?php
    use App\User;
    use Illuminate\Database\Seeder;

    class UserSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            $users = User::get();
            if ( count( $users ) ) {
                foreach ($users as $user) {
                    # code...
                }
            } else {
                User::create( [
                    'candidate_number' => 1,
                    'name' => 'Archimak',
                    'email' => 'juancarmentia@gmail.com',
                    'password' => \Hash::make( '12345678' ),
                    'date_of_birth' => '1997-08-12',
                    'level' => 1,
                    'id_member' => 1,
                    'member' => 'ArchilujAs',
                ] );
                User::create( [
                    'candidate_number' => 2,
                    'name' => 'KolujAs',
                    'email' => 'fernandodeibe@gmail.com',
                    'password' => \Hash::make( '12345678' ),
                    'date_of_birth' => '1994-02-15',
                    'level' => 1,
                    'id_member' => 2,
                    'member' => 'ArchilujAs',
                ] );
            }
        }
    }