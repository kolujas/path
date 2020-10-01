<?php
    namespace App\Http\Controllers;

    use App\Models\Candidate;
    use Illuminate\Http\Request;

    class CandidateController extends Controller{
        /**
         * * Show the 'candidates panel' page.
         * @return [type]
         */
        public function panel(){
            return view('candidates.panel', [
                'candidates' => Candidate::all(),
            ]);
        }

        /**
         * * Create a Candidate.
         * @param Request $request
         * @return [type]
         */
        public function doCreate(Request $request){
            $input = (object) $request->all();
            $validator = Validator::make($request->all(), Candidate::$validation['create']['general']['rules'], Candidate::$validation['create']['general']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/candidates#details")->withErrors($validator)->withInput();
            }

            if(isset($input->id_role) && $input->id_role == 1){
                $validator = Validator::make($request->all(), $this->replaceString(Candidate::$validation['create']['admin']['rules'], "({[a-z_]*})", $id_candidate), Candidate::$validation['create']['admin']['messages']['en']);
                if($validator->fails()){
                    return redirect("/panel/candidates#details")->withErrors($validator)->withInput();
                }
            }else if(isset($input->id_role) && $input->id_role == 2){
                $validator = Validator::make($request->all(), $this->replaceString(Candidate::$validation['create']['student']['rules'], "({[a-z_]*})", $id_candidate), Candidate::$validation['create']['student']['messages']['en']);
                if($validator->fails()){
                    return redirect("/panel/candidates#details")->withErrors($validator)->withInput();
                }
            }
    
            if(isset($input->password)){
                $input->password = \Hash::make($input->password);
            }

            $input->slug = SlugService::createSlug(Candidate::class, 'slug', $input->name);
            
            $candidate = Candidate::create((array) $input);
            
            return redirect("/panel/candidates#details&id=$candidate->id_candidate")->with('status', [
                'code' => 200,
                'message' => 'Candidate created correcttly.',
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
            $validator = Validator::make($request->all(), $this->replaceString(Candidate::$validation['edit']['general']['rules'], "({[a-z_]*})", $id_candidate), Candidate::$validation['edit']['general']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/candidates#details?id=$id_candidate")->withErrors($validator)->withInput();
            }

            if(isset($input->id_role) && $input->id_role == 1){
                $validator = Validator::make($request->all(), $this->replaceString(Candidate::$validation['edit']['admin']['rules'], "({[a-z_]*})", $id_candidate), Candidate::$validation['edit']['admin']['messages']['en']);
                if($validator->fails()){
                    return redirect("/panel/candidates#details?id=$id_candidate")->withErrors($validator)->withInput();
                }
            }else if(isset($input->id_role) && $input->id_role == 2){
                $validator = Validator::make($request->all(), $this->replaceString(Candidate::$validation['edit']['student']['rules'], "({[a-z_]*})", $id_candidate), Candidate::$validation['edit']['student']['messages']['en']);
                if($validator->fails()){
                    return redirect("/panel/candidates#details?id=$id_candidate")->withErrors($validator)->withInput();
                }
            }
    
            if(isset($input->password)){
                $input->password = \Hash::make($input->password);
            }else if($candidate->password){
                $input->password = $candidate->password;
            }

            if($candidate->name != $input->name){
                $input->slug = SlugService::createSlug(Candidate::class, 'slug', $input->name);
            }else{
                $input->slug = $candidate->slug;
            }
            
            $candidate->update((array) $input);
            
            return redirect("/panel/candidates#details&id=$id_candidate")->with('status', [
                'code' => 200,
                'message' => "Candidate: \"$candidate->name\" edited correctly.",
            ]);
        }

        /**
         * * Delete a Candidate.
         * @param mixed $id_candidate - Candidate primary key.
         * @return [type]
         */
        public function doEliminar($id_candidate){
            $candidate = Candidate::find($id_candidate);
                
            $candidate->delete();
            
            return redirect()->route('web.panel')->with('status', [
                'code' => 200,
                'message' => "Candidate deleted correctly.",
            ]);
        }
    }