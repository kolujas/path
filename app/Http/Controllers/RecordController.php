<?php
    namespace App\Http\Controllers;

    use App\Models\Record;
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
        public function doCreate(Request $request){
            $input = (object) $request->all();
            dd($input);
        }
    }