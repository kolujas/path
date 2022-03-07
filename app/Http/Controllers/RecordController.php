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
            // $records = Record::all();
            // foreach ($records as $record) {
            //     $record->candidate = $record->candidate();
            //     $record->exam = $record->exam();
            // }
            return view('records.panel', [
                'count' => ((is_float(Record::all()->count() / 100)) ? intval(Record::all()->count() / 100) + 1 : intval(Record::all()->count() / 100)),
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
            $permissions = false;
            foreach($modules as $module) {
                if ($module->folder == 'DEMO') {
                    $permissions = true;
                }
            }

            if (!$permissions) {
                $evaluation->update(['answers' => json_encode((array) $input)]);
    
                $evaluation->strikes = $input->strikes;
                $evaluation->save();

                $mpdf = PDF::loadView("pdf.exam", [
                    'answers' => $request->all(),
                    'candidate' => $candidate,
                    'evaluation' => $evaluation,
                    'modules' => $modules,
                ], [ ], [
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
        
                Storage::put("records/$evaluation->id_evaluation/" . preg_replace("/\//", "_", $evaluation->exam->name) . ".pdf", $mpdf->output());
                
                if(!count($records = Record::where('id_evaluation', '=', $evaluation->id_evaluation)->get())){
                    $input->id_evaluation = $evaluation->id_evaluation;
                    $input->folder = $filePath;
        
                    $record = Record::create((array) $input);
                }
    
                $evaluation->id_status = 1;
                $evaluation->save();
            }
            
            foreach (Auth::guard('candidates')->user()->tokens as $token) {
                $token->delete();
            }
            Auth::guard('candidates')->logout();

            return redirect("/exam/$evaluation->id_evaluation/finished");
        }

        static function deleteByEvaluation($id_evaluation){
            $record = Record::where('id_evaluation', '=', $id_evaluation)->get()[0];
            
            $record->delete();
            
            return [
                'code' => 200,
                'message' => 'Record deleted correctly.',
            ];
        }
    }