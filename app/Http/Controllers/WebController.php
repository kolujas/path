<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class WebController extends Controller{
        /**
         * * Show the 'panel' page.
         * @return [type]
         */
        public function panel(){
            return view('web.panel', [
                //
            ]);
        }
    }