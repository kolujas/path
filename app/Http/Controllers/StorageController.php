<?php
    namespace App\Http\Controllers;

    use App\Models\Candidate;
    use App\Models\Record;
    use Storage;

    class StorageController extends Controller{
        public function showRecordFile($id_record){
            $record = Record::find($id_record);
            
            return response()->file(storage_path('app/private/' . $record->file));
        }
        
        public function showCandidateFile($id_candidate){
            $candidate = Candidate::find($id_candidate);
            
            return response()->file(storage_path('app/private/' . $candidate->file));
        }

        static function makePDF($data){
            try {
                //code...
            } catch (\Throwable $th) {
                return false;
            }
        }
    }