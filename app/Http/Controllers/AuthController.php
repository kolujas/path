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
    }