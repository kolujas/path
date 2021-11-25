<?php
    namespace App\Http\Controllers\API;

    use App;
    use App\Http\Controllers\Controller;
    use Carbon\Carbon;
    use Illuminate\Http\Request;

    class ServerController extends Controller{
        /**
         * * Returns the App enviroment.
         * @param Request $request
         * @return JSON
         */
        public function enviroment (Request $request) {
            return response()->json([
                'code' => 200,
                'data' => [
                    'enviroment' => App::environment(),
                ],
            ]);
        }

        /**
         * * Returns the App current time.
         * @param Request $request
         * @return JSON
         */
        public function currentTime (Request $request){
            $now = Carbon::now();
            if (App::environment() == 'local') {
                $now->subHour(3);
            }

            return response()->json([
                'code' => 200,
                'data' => [
                    'now' => $now->toDateTimeString(),
                ],
            ]);
        }
    }