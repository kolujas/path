<?php
    use App\Models\Record;
    use Illuminate\Database\Seeder;

    class RecordSeeder extends Seeder {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run() {
            $records = Record::get();
            if ( count( $records ) ) {
                foreach ($records as $record) {
                    # code...
                }
            } else {
                # code...
            }
        }
    }