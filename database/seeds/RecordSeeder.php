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
                    $record->update([
                        'file' => 'records/1.pdf',
                    ]);
                }
            } else {
                Record::create( [
                    'id_evaluation' => 8,
                    'file' => 'records/1.pdf',
                ] );
                Record::create( [
                    'id_evaluation' => 9,
                    'file' => 'records/1.pdf',
                    'strikes' => 4,
                ] );
                Record::create( [
                    'id_evaluation' => 10,
                    'file' => 'records/1.pdf',
                    'strikes' => 8,
                ] );
                Record::create( [
                    'id_evaluation' => 11,
                    'file' => 'records/1.pdf',
                    'strikes' => 1,
                ] );
            }
        }
    }