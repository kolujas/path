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
                    'name' => 'Archimak',
                    'email' => 'juancarmentia@gmail.com',
                    'password' => \Hash::make( '12345678' ),
                    'slug' => 'archimak',
                ] );
                User::create( [
                    'name' => 'KolujAs',
                    'email' => 'fernandodeibe@gmail.com',
                    'password' => \Hash::make( '12345678' ),
                    'slug' => 'kolujas',
                ] );
            }
        }
    }