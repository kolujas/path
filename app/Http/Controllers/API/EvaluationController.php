<?php
    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;

    class EvaluationController extends Controller{
        public function save(Request $request){
            return response()->json([
                'code' => 200,
                'message' => 'Session started.',
                'data' => (object)$request->input,
            ]);
        }
    }