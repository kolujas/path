<?php
    namespace App\Http\Controllers\API;

    use App\Http\Controllers\Controller;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class ServerController extends Controller{
        public function currentTime(Request $request){
            return response()->json([
                'code' => 200,
                'data' => [
                    'now' => Carbon::now()->toDateTimeString(),
                ],
            ]);
        }
    }