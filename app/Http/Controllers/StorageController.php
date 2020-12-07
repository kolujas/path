<?php
    namespace App\Http\Controllers;

    use App\Models\Candidate;
    use App\Models\Record;
    use PDF;
    use Storage;

    class StorageController extends Controller{
        /**
         * * Returns the PDF file.
         * @param mixed $id_record
         * @return [type]
         */
        public function showRecordFiles($id_record){
            $record = Record::find($id_record);

            if (preg_match("/\./", $record->folder)) {
                return response()->file(storage_path('app/private/' . $record->folder));
            } else {
                return view('records.files', [
                    'record' => $record,
                ]);
            }
        }

        /**
         * * Returns the PDF file.
         * @param mixed $id_record
         * @param mixed $name
         * @return [type]
         */
        public function showRecordFile($id_record, $name){
            $record = Record::find($id_record);

            foreach ($record->files() as $file) {
                if ($file->url == $name) {
                    return response()->file(storage_path('app/private/' . $file->file));
                }
            }
        }

       /**
        * * Makes an PDF with mPDF.
        * @param mixed $module
        * @param mixed $data
        * @param mixed $filePath
        */
        static function makePDF($module, $data, $filePath){
            $mpdf = PDF::loadView("pdf.$module->folder.$module->file", (array) $data, [ ], [
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 30,
                'margin_bottom'        => 10,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'title'                => 'PDF creado desde la página de Path',
                'author'               => 'Path',
            ]);
    
            Storage::put($filePath, $mpdf->output());
        }
    }