<?php
    namespace App\Http\Controllers\API;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\Module;
    use App\Models\Record;
    use App\Http\Controllers\Controller;
    use Auth;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\View;
    use PDF;
    use Storage;

    class RecordController extends Controller{
        /**
         * * Save the Record.
         * @param Request $request
         * @param mixed $id_evaluation - Exam to Record.
         * @return [type]
         */
        public function save(Request $request, $id_evaluation){
            $candidate = $request->user();
            $modules = $candidate->modules();
            $evaluation = Evaluation::find($id_evaluation);

            $input = $request->all();
            foreach ($input as $key => $value) {
                if(preg_match("/\[/", $key)){
                    $subkey = preg_split("/\[/", $key);
                    $subkey = preg_split("/\]/", $subkey[1])[0];
                    $key = preg_replace("/\[.*\]/", '', $key);
                    if(!isset($input[$key])){
                        $input[$key] = [];
                    }
                    $input[$key][$subkey] = $value;
                }
            }

            $validator = Validator::make($request->all(), Record::$validation['create']['rules'], Record::$validation['create']['messages']['en']);
            if($validator->fails()){
                return response()->json([
                    'code' => 404,
                    'data' => $validator->errors()->messages(),
                    'message' => 'Validation error.',
                ]);
            }

            $filePath = "storage/records/$evaluation->id_evaluation.pdf";
            $pdf = false;
            $data = (object) [
                'evaluation' => $evaluation,
                'candidate' => $candidate,
                'answers' => $input,
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

            try {
                $pdf->save("storage/../private/$filePath");
            } catch (\Throwable $th) {
                return response()->json([
                    'code' => 500,
                    'data' => $th,
                    'message' => 'PDF upload error.',
                ]);
            }
            
            if(!count(Record::where('id_evaluation', '=', $evaluation->id_evaluation)->get())){
                $input['id_evaluation'] = $evaluation->id_evaluation;
                $input['file'] = $filePath;
    
                $record = Record::create((array) $input);
            }
            
            return response()->json([
                'code' => 200,
                'message' => 'Exam saved.',
            ]);
        }
    }