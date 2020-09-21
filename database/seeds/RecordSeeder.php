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
                Record::create( [
                    'id_student' => 1,
                    'file' => 'records/1.pdf',
                ] );
                Record::create( [
                    'id_student' => 2,
                    'file' => 'records/2.pdf',
                ] );
            }
        }
    }