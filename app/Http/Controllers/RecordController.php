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
                // 'records' => $records,
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
                $data = (object) [
                    'evaluation' => $evaluation,
                    'candidate' => $candidate,
                    'answers' => $request->all(),
                ];
    
                $evaluation->strikes = $input->strikes;
                $evaluation->save();
    
                foreach($modules as $index => $module) {
                    $data->module = $module;
                    $name = preg_replace("/\+/", "", preg_replace("/-/", "", preg_replace("/ /", "_", $module->folder))) . '-' . $module->initials;
                    $filePath = "records/$evaluation->id_evaluation";
                    
                    if ($index + 1 >= count($modules)) {
                        StorageController::makePDF($module, $data, "$filePath/$name.pdf");
                    }
                }
                
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