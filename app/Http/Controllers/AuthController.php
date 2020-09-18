<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class AuthController extends Controller{
        /**
         * * Show the 'log in' page.
         * @return [type]
         */
        public function showLogin(){
            return view('auth.login', [
                //
            ]);
        }

        /**
         * * Log the User in.
         * @return [type]
         */
        public function doLogin(Request $request){
            $input = (object)$request->input();
            dd($input);
            // Auth::login($user, true);
        }
    }