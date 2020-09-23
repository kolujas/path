<?php
    namespace App\Http\Controllers;

    use App\User;
    use Illuminate\Http\Request;

    class UserController extends Controller{
        /**
         * * Show the 'users panel' page.
         * @return [type]
         */
        public function panel(){
            return view('users.panel', [
                'users' => User::all(),
            ]);
        }

        /**
         * * Create a User.
         * @param Request $request
         * @return [type]
         */
        public function doCreate(Request $request){
            $input = (object) $request->all();
            $validator = Validator::make($request->all(), User::$validation['create']['general']['rules'], User::$validation['create']['general']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/users#details")->withErrors($validator)->withInput();
            }

            if(isset($input->id_role) && $input->id_role == 1){
                $validator = Validator::make($request->all(), $this->replaceString(User::$validation['create']['admin']['rules'], "({[a-z_]*})", $id_user), User::$validation['create']['admin']['messages']['en']);
                if($validator->fails()){
                    return redirect("/panel/users#details")->withErrors($validator)->withInput();
                }
            }else if(isset($input->id_role) && $input->id_role == 2){
                $validator = Validator::make($request->all(), $this->replaceString(User::$validation['create']['student']['rules'], "({[a-z_]*})", $id_user), User::$validation['create']['student']['messages']['en']);
                if($validator->fails()){
                    return redirect("/panel/users#details")->withErrors($validator)->withInput();
                }
            }
    
            if(isset($input->password)){
                $input->password = \Hash::make($input->password);
            }

            $input->slug = SlugService::createSlug(User::class, 'slug', $input->name);
            
            $user = User::create((array) $input);
            
            return redirect("/panel/users#details&id=$user->id_user")->with('status', [
                'code' => 200,
                'message' => 'User created correcttly.',
            ]);
        }
        
        /**
         * * Edit a User.
         * @param Request $request
         * @param mixed $id_user - User primary key.
         * @return [type]
         */
        public function doEdit(Request $request, $id_user){
            $user = User::find($id_user);

            $input = (object) $request->all();
            $validator = Validator::make($request->all(), $this->replaceString(User::$validation['edit']['general']['rules'], "({[a-z_]*})", $id_user), User::$validation['edit']['general']['messages']['en']);
            if($validator->fails()){
                return redirect("/panel/users#details?id=$id_user")->withErrors($validator)->withInput();
            }

            if(isset($input->id_role) && $input->id_role == 1){
                $validator = Validator::make($request->all(), $this->replaceString(User::$validation['edit']['admin']['rules'], "({[a-z_]*})", $id_user), User::$validation['edit']['admin']['messages']['en']);
                if($validator->fails()){
                    return redirect("/panel/users#details?id=$id_user")->withErrors($validator)->withInput();
                }
            }else if(isset($input->id_role) && $input->id_role == 2){
                $validator = Validator::make($request->all(), $this->replaceString(User::$validation['edit']['student']['rules'], "({[a-z_]*})", $id_user), User::$validation['edit']['student']['messages']['en']);
                if($validator->fails()){
                    return redirect("/panel/users#details?id=$id_user")->withErrors($validator)->withInput();
                }
            }
    
            if(isset($input->password)){
                $input->password = \Hash::make($input->password);
            }else if($user->password){
                $input->password = $user->password;
            }

            if($user->name != $input->name){
                $input->slug = SlugService::createSlug(User::class, 'slug', $input->name);
            }else{
                $input->slug = $user->slug;
            }
            
            $user->update((array) $input);
            
            return redirect("/panel/users#details&id=$id_user")->with('status', [
                'code' => 200,
                'message' => "User: \"$user->name\" edited correctly.",
            ]);
        }

        /**
         * * Delete a User.
         * @param mixed $id_user - User primary key.
         * @return [type]
         */
        public function doEliminar($id_user){
            $user = User::find($id_user);
                
            $user->delete();
            
            return redirect()->route('web.panel')->with('status', [
                'code' => 200,
                'message' => "User deleted correctly.",
            ]);
        }
    }