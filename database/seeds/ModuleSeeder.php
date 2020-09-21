<?php
    use App\Models\Module;
    use Illuminate\Database\Seeder;

    class ModuleSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            $modules = Module::get();
            if ( count( $modules ) ) {
                foreach ($modules as $module) {
                    # code...
                }
            } else {
                Module::create( [
                    'folder' => 'modules/1/writing',
                ] );
                Module::create( [
                    'folder' => 'modules/1/listening',
                ] );
            }
        }
    }