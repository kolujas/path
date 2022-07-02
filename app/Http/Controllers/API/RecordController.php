<?php
    namespace App\Http\Controllers\API;

    use App\Models\Candidate;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\Module;
    use App\Models\Record;
    use App\Http\Controllers\Controller;
    use App\Http\Controllers\StorageController;
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
                if(preg_match("/\[(.)+\]\[/", $key)){
                    $subkeys = preg_split("/\[/", $key);
                    $key = preg_split("/\]/", $subkeys[0])[0];
                    $subkey = preg_split("/\]/", $subkeys[1])[0];
                    $_subkey = preg_split("/\]/", $subkeys[2])[0];
                    if(!isset($input[$key])){
                        $input[$key] = [];
                        if(!isset($input[$key][$subkey])){
                            $input[$key][$subkey] = [];
                        }
                        $input[$key][$subkey][$_subkey] = $value;
                    }else{
                        if(!isset($input[$key][$subkey])){
                            $input[$key][$subkey] = [];
                        }
                        $input[$key][$subkey][$_subkey] = $value;
                    }
                }else if(preg_match("/\[/", $key)){
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
            $permissions = false;
            foreach($candidate->modules() as $module) {
                if ($module->folder == 'DEMO') {
                    $permissions = true;
                }
            }

            if (!$permissions) {
                $evaluation->update(['answers' => json_encode($input)]);
    
                $evaluation->strikes = $input['strikes'];
                $evaluation->save();

                $mpdf = PDF::loadView("pdf.exam", [
                    'answers' => $input,
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

                $filePath = "records/$evaluation->id_evaluation";
                Storage::put($filePath. "/" . preg_replace("/\//", "_", $evaluation->exam->name) . ".pdf", $mpdf->output());

                if(!count(Record::where('id_evaluation', '=', $evaluation->id_evaluation)->get())){
                    $input['id_evaluation'] = $evaluation->id_evaluation;
                    $input['folder'] = $filePath;

                    $record = Record::create((array) $input);
                }
            }
            
            return response()->json([
                'code' => 200,
                'message' => 'Exam saved.',
            ]);
        }

        /**
         * * Get all the Records.
         * @param Request $request
         * @param string $length
         * @return [type]
         */
        public function getAll(Request $request, $length = null){
            if ($length === null) {
                $records = Record::all();
                foreach ($records as $record) {
                    $record->candidate = $record->candidate();
                    $record->exam = $record->exam();
                }
            } else {
                $records = Record::skip(($length * 100))->take(100)->get();
                foreach ($records as $record) {
                    $record->candidate = $record->candidate();
                    $record->exam = $record->exam(true);
                }
            }
            return response()->json([
                'code' => 200,
                'data' => [
                    'records' => $records,
                    'more' => (count(Record::skip(($length * 100) + 1)->take(100)->get())) ? true : false,
                ],
            ]);
        }
    }