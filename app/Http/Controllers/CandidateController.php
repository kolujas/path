<?php
    namespace App\Http\Controllers;

    use App\Models\Candidate;
    use App\Models\Module;
    use Auth;
    use Cviebrock\EloquentSluggable\Services\SlugService;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

    class CandidateController extends Controller{
        /**
         * * Show the 'candidates panel' page.
         * @return [type]
         */
        public function panel(){
            return view('candidates.panel', [
                'candidates' => Candidate::all(),
                'modules' => Module::$array,
                'validation' => (object)[
                    'create' => (object)[
                        'rules' => Candidate::$validation['create']['rules'],
                        'messages' => Candidate::$validation['create']['messages']['en'],
                    ], 'edit' => (object)[
                        'rules' => Candidate::$validation['edit']['rules'],
                        'messages' => Candidate::$validation['edit']['messages']['en'],
                    ], 'csv' => (object)[
                        'rules' => Candidate::$validation['csv']['rules'],
                        'messages' => Candidate::$validation['csv']['messages']['en'],
                    ],
                ],
            ]);
        }

        /**
         * * Create a Candidate.
         * @param Request $request
         * @return [type]
         */
        public function doCreate(Request $request){
            $input = (object) $request->all();
            $validator = Validator::make($request->all(), Candidate::$validation['create']['rules'], Candidate::$validation['create']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/candidates#details")->withErrors($validator)->withInput();
            }

            $modules = $input->modules;
            $input->modules = '';

            foreach ($modules as $key => $module) {
                if(!$input->modules){
                    $input->modules = $module;
                }else{
                    $input->modules = "$input->modules,$module";
                }
            }

            $input->slug = SlugService::createSlug(Candidate::class, 'slug', $input->full_name);
            $input->id_user = Auth::user()->id_user;
            
            $candidate = Candidate::create((array) $input);
            
            return redirect("/panel/candidates#details?id=$candidate->id_candidate")->with('status', [
                'code' => 200,
                'message' => 'Candidate created correctly.',
            ]);
        }

        /**
         * * Create multiple Candidates by CSV file.
         * @param Request $request
         * @return [type]
         */
        public function doCreateByCSV(Request $request){
            $filepath = $request->file('csv');
            $file = fopen($filepath, "r");
            $candidates = collect([]);
            $input = [];
            $indexes = [];
            $i = 0;
            while(($filedata = fgetcsv($file, 1000, ",")) !== false){
                $num = count($filedata);
                for($c = 0; $c < $num; $c++){
                    if($i == 0){
                        $indexes[] = $filedata[$c];
                    }else{
                        foreach ($indexes as $index => $value) {
                            if($c == $index){
                                $input[$i][$value] = $filedata[$c];
                                if($value == 'full_name'){
                                    $input[$i]['slug'] = SlugService::createSlug(Candidate::class, 'slug', $filedata[$c]);
                                }
                            }
                        }
                    }
                }
                if($i > 0){
                    $input[$i]->id_user = Auth::user()->id_user;
                    $candidates->push(Candidate::create((array) $input[$i]));
                }
                $i++;
            }
            fclose($file);
            
            return redirect("/panel/candidates")->with('status', [
                'code' => 200,
                'message' => 'Candidates created correctly.',
            ]);
        }
        
        /**
         * * Edit a Candidate.
         * @param Request $request
         * @param mixed $id_candidate - Candidate primary key.
         * @return [type]
         */
        public function doEdit(Request $request, $id_candidate){
            $candidate = Candidate::find($id_candidate);

            $input = (object) $request->all();
            $validator = Validator::make($request->all(), $this->replaceString(Candidate::$validation['edit']['rules'], "({[a-z_]*})", $id_candidate), Candidate::$validation['edit']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/candidates#details?id=$id_candidate")->withErrors($validator)->withInput();
            }

            if($candidate->full_name != $input->full_name){
                $input->slug = SlugService::createSlug(Candidate::class, 'slug', $input->full_name);
            }else{
                $input->slug = $candidate->slug;
            }

            $modules = $input->modules;
            $input->modules = '';

            foreach ($modules as $key => $module) {
                if(!$input->modules){
                    $input->modules = $module;
                }else{
                    $input->modules = "$input->modules,$module";
                }
            }
            
            $input->id_user = Auth::user()->id_user;
            $candidate->update((array) $input);

            if($candidate->full_name){
                $msg = "Candidate: \"$candidate->full_name\" edited correctly.";
            }else{
                $msg = "Candidate edited correctly.";
            }
            
            return redirect("/panel/candidates#details?id=$id_candidate")->with('status', [
                'code' => 200,
                'message' => $msg,
            ]);
        }

        /**
         * * Delete a Candidate.
         * @param mixed $id_candidate - Candidate primary key.
         * @return [type]
         */
        public function doDelete($id_candidate){
            $candidate = Candidate::find($id_candidate);
            
            $response = EvaluationController::DeleteByCandidate($id_candidate);

            if ($response->code == 200) {
                $candidate->delete();
    
                return redirect("/panel/candidates")->with('status', [
                    'code' => 200,
                    'message' => "Candidate deleted correctly.",
                ]);
            } else {
                return redirect("/panel/candidates")->with('status', [
                    'code' => 500,
                    'message' => "$candidate->full_name can not be deleted because there is a record from his evaluation.",
                ]);
            }
        }

        /**
         * * Refresh the Candidate.
         * @param mixed $id_candidate - Candidate primary key.
         * @return [type]
         */
        public function doRefresh($id_candidate){
            $candidate = Candidate::find($id_candidate);
            
            $response = EvaluationController::RefreshLoggedInByCandidate($id_candidate);

            return redirect("/panel/candidates")->with('status', [
                'code' => 200,
                'message' => "$candidate->full_name can join at the exam again.",
            ]);
        }
    }