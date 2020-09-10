<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class ExamController extends Controller{
        /**
         * * Show the 'panel' page.
         * @return [type]
         */
        public function examem1(){
            return view('exams.exam-1', [
                //
            ]);
        }
    }