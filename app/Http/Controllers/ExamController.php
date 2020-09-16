<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class ExamController extends Controller{
        /**
         * * Show the 'panel' page.
         * @return [type]
         */
        public function exam1(){
            return view('exams.exam-1', [
                //
            ]);
        }

        public function rules(){
            return view('exams.rules', [
                //
            ]);
        }
    }