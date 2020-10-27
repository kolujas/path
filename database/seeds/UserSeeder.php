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
                // User::create( [
                //     'name' => 'Destroyer man',
                //     'email' => 'juanchaher99@gmail.com',
                //     'password' => \Hash::make( '12345678' ),
                //     'slug' => 'destroyer-man',
                // ] );
                // User::create( [
                //     'name' => 'Path tester',
                //     'email' => 'test@path.com',
                //     'password' => \Hash::make( 'PathTester20' ),
                //     'slug' => 'path-tester',
                // ] );
            } else {
                User::create( [
                    'name' => 'Archimak',
                    'email' => 'juancarmentia@gmail.com',
                    'password' => \Hash::make( '12345678' ),
                    'slug' => 'archimak',
                ] );
                User::create( [
                    'name' => 'kolujAs',
                    'email' => 'fernandodeibe@gmail.com',
                    'password' => \Hash::make( '12345678' ),
                    'slug' => 'kolujas',
                ] );
            }
        }
    }