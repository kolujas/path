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
                    //
                }
            } else {
                Record::create( [
                    'id_evaluation' => 8,
                    'file' => 'records/1.pdf',
                ] );
            }
        }
    }