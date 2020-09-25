<?php
    namespace App\Http\Controllers;

    use App\Models\Evaluation;
    use App\Models\Exam;
    use App\Models\Record;
    use Auth;
    use Illuminate\Http\Request;

    class RecordController extends Controller{
        /**
         * * Show the 'records panel' page.
         * @return [type]
         */
        public function panel(){
            return view('records.panel', [
                'records' => Record::all(),
            ]);
        }

        /**
         * * Create a Record.
         * @param Request $request
         * @return [type]
         */
        public function doCreate(Request $request, $id_exam){
            $input = (object) $request->all();
            $candidate = Auth::guard('candidates')->user();
            $evaluation = Evaluation::where([['id_exam', '=', $id_exam], ['id_candidate', '=', $candidate->id_candidate]])->get();
            $evaluation = $evaluation[0];
        }
    }