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
    }