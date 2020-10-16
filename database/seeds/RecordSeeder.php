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
                //
            } else {
                Record::create( [
                    'id_evaluation' => 8,
                    'file' => 1,
                ] );
                Record::create( [
                    'id_evaluation' => 9,
                    'file' => 2,
                    'strikes' => 4,
                ] );
                Record::create( [
                    'id_evaluation' => 10,
                    'file' => 3,
                    'strikes' => 8,
                ] );
                Record::create( [
                    'id_evaluation' => 11,
                    'file' => 4,
                    'strikes' => 1,
                ] );
            }
        }
    }