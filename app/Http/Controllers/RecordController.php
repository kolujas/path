<?php
    namespace App\Http\Controllers;

    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\Record;
    use Auth;
    use Illuminate\Http\Request;
    use PDF;
    use Storage;

    class RecordController extends Controller{
        /**
         * * Show the 'records panel' page.
         * @return [type]
         */
        public function panel(){
            return view('records.panel', [
                'records' => Record::all(),
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

            $filetype = pathinfo('/img/recursos/logo_white.png', PATHINFO_EXTENSION);

            if ($filetype==='svg'){
                $filetype .= '+xml';
            }
    
            $get_img = file_get_contents('img/recursos/logo_white.png');
            $img = 'data:image/' . $filetype . ';base64,' . base64_encode($get_img );

            $pdf = PDF::loadView('pdf.exam', [
                'exam' => $exam,
                'img' => $img,
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
            ])->save("storage/records/$evaluation->id_evaluation.pdf");

            return redirect("/exam/$id_exam/finished");
        }

        public function crealo(){
            $pdf = PDF::loadView('pdf.exam', [ ], [
                //
            ], [
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
            ])->save("storage/records/1.pdf");
            return view('pdf.exam', [
                //
            ]);
        }
    }