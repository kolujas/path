<?php
    namespace App\Http\Controllers;

    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\Module;
    use App\Models\Record;
    use Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
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
                'modules' => Module::$array,
            ]);
        }

        /**
         * * Create a Record.
         * @param Request $request
         * @param mixed $id_evaluation - Evaluation to Record.
         * @return [type]
         */
        public function doCreate(Request $request, $id_evaluation){
            $candidate = Auth::guard('candidates')->user();
            $modules = $candidate->modules();
            $evaluation = Evaluation::find($id_evaluation);

            $input = (object) $request->all();
            $validator = Validator::make($request->all(), Record::$validation['create']['rules'], Record::$validation['create']['messages']['en']);
            if($validator->fails()){
                return redirect("/exam/$evaluation->id_evaluation/rules")->withErrors($validator)->withInput();
            }

            $pdf = false;
            $data = (object) [
                'evaluation' => $evaluation,
                'candidate' => $candidate,
                'answers' => $request->all(),
            ];

            foreach($modules as $module) {
                $data->module = $module;
                if(!$pdf) {
                    $pdf = PDF::loadView("pdf.$module->folder.$module->file", (array) $data, [ ], [
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
                }else{
                    $pdf->getMpdf()->AddPage();
                    $pdf->getMpdf()->WriteHTML(View::make("pdf.$module->folder.$module->file", (array) $data));
                }
            }

            $filePath = "records/$evaluation->id_evaluation.pdf";
            
            Storage::put($filePath, $pdf->output());

            // try {
            //     $pdf->save("storage/../private/$filePath");
            // } catch (\Throwable $th) {
            //     dd($th);
            // }
            
            if(!count($records = Record::where('id_evaluation', '=', $evaluation->id_evaluation)->get())){
                $input->id_evaluation = $evaluation->id_evaluation;
                $input->file = $filePath;
    
                $record = Record::create((array) $input);
            }

            $evaluation->id_status = 1;
            $evaluation->save();
            
            foreach (Auth::guard('candidates')->user()->tokens as $token) {
                $token->delete();
            }
            Auth::guard('candidates')->logout();

            return redirect("/exam/$evaluation->id_evaluation/finished");
        }
    }