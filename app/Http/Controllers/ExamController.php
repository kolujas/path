<?php
    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

    class ExamController extends Controller{
        /**
         * * Show the 'exam rules' page.
         * @return [type]
         */
        public function rules(){
            return view('exams.rules', [
                //
            ]);
        }
        
        /**
         * * Show the 'panel' page.
         * @param null|string $id_exam - Exam primary key.
         * @return [type]
         */
        public function show($id_exam = null){
            return view('exams.example-exam', [
                //
            ]);
        }
    }