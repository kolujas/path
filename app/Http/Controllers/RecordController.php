<?php
    namespace App\Http\Controllers;

    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\Module;
    use App\Models\Record;
    use Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\View;
    use PDF;
    use Storage;

    class RecordController extends Controller{
        /**
         * * Show the 'records panel' page.
         * @return [type]
         */
        public function panel(){
            $records = Record::all();
            foreach ($records as $record) {
                $record->candidate = $record->candidate();
                $record->exam = $record->exam();
            }
            return view('records.panel', [
                'records' => $records,
            ]);
        }

        /**
         * * Create a Record.
         * @param Request $request
         * @return [type]
         */
        public function doCreate(Request $request, $id_exam){
            $input = (object) $request->all();
            $candidate = Auth::guard('candidates')->user();
            $exam = Exam::find($id_exam);
            $evaluation = Evaluation::where([['id_exam', '=', $id_exam], ['id_candidate', '=', $candidate->id_candidate]])->get();
            $evaluation = $evaluation[0];

            $filePath = "storage/records/$evaluation->id_evaluation.pdf";

            $pdf = PDF::loadView('pdf.A1.listening', [
                'exam' => $exam,
            ], [ ], [
                'format'               => 'A4',
                'default_font_size'    => '12',
                'default_font'         => 'sans-serif',
                'margin_left'          => 0,
                'margin_right'         => 0,
                'margin_top'           => 20,
                'margin_bottom'        => 20,
                'margin_header'        => 0,
                'margin_footer'        => 0,
                'title'                => 'PDF creado desde la página de path',
                'author'               => 'Path',
            ]);
            $pdf->getMpdf()->AddPage('pdf.A1.writing');
            try {
                $pdf->save($filePath);
            } catch (\Throwable $th) {
                return $pdf->stream();
            }
            return redirect("/exam/$id_exam/finished");
        }

        public function crealo(){
            $candidate = Auth::guard('candidates')->user();
            $modules = $candidate->modules();
            $exam = Exam::find(1);
            $pdf = false;
            $data = [
                'exam' => $exam,
            ];
            foreach($modules as $module) {
                if(!$pdf) {
                    $pdf = PDF::loadView("pdf.$module->folder.$module->file", [
                        'exam' => $exam,
                    ], [ ], [
                        'format'               => 'A4',
                        'default_font_size'    => '12',
                        'default_font'         => 'sans-serif',
                        'margin_left'          => 0,
                        'margin_right'         => 0,
                        'margin_top'           => 20,
                        'margin_bottom'        => 20,
                        'margin_header'        => 0,
                        'margin_footer'        => 0,
                        'title'                => 'PDF creado desde la página de Path',
                        'author'               => 'Path',
                    ]);
                }else{
                    $pdf->getMpdf()->AddPage();
                    $pdf->getMpdf()->WriteHTML(View::make("pdf.$module->folder.$module->file", [], [])->render());
                }
            }
            try {
                $pdf->save("storage/records/1.pdf");
            } catch (\Throwable $th) {
                return $pdf->stream();
            }
	        return $pdf->stream();
        }
    }