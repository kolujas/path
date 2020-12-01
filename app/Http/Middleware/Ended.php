<?php
    namespace App\Http\Middleware;

    use App\Exceptions\Handler;
    use App\Models\Evaluation;
    use App\Models\Exam;
    use Auth;
    use Carbon\Carbon;
    use Closure;

    class Ended{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next){
            $candidate = Auth::guard('candidates')->user();
            $id_evaluation = $request->route('id_evaluation');
            $evaluation = Evaluation::find($id_evaluation);

            $now = Carbon::now()->toDateTimeString();

            $date = explode(' ', $evaluation->exam->scheduled_date_time)[0];
            $time = explode(' ', $evaluation->exam->scheduled_date_time)[1];
            
            $daysOfTheMonths = [ 31, 28, 31, 30, 31, 30, 31, 31, 30, 31, 30, 31]; 
            if(preg_match("/-/", $date)){
                $years = intval(explode("-", $date)[0]);
                $months = intval(explode("-", $date)[1]);
                $days = intval(explode("-", $date)[2]);
            }else if(preg_match("/\//", $date)){
                $years = intval(explode("/", $date)[0]);
                $months = intval(explode("/", $date)[1]);
                $days = intval(explode("/", $date)[2]);
            }
            $hours = intval(explode(':', $time)[0]);
            $minutes = intval(explode(':', $time)[1]);
            $seconds = intval(explode(':', $time)[1]);

            foreach ($candidate->modules() as $module) {
                $module_time = explode(':', $module->time);
                $hours += intval($module_time[0]);
                $minutes += intval($module_time[1]);
                $seconds += intval($module_time[2]);
            }
            
            if($length = intval($seconds / 60)){
                $seconds = $seconds - (60 * $length);
                for ($i=1; $i <= $length; $i++) { 
                    $minutes++;
                }
            }
            if($seconds < 10){
                $seconds = "0$seconds";
            }
            if($length = intval($minutes / 60)){
                $minutes = $minutes - (60 * $length);
                for ($i=1; $i <= $length; $i++) { 
                    $hours++;
                }
            }
            if($minutes < 10){
                $minutes = "0$minutes";
            }
            if($length = intval($hours / 24)){
                $hours = $hours - (24 * $length);
                for ($i=1; $i <= $length; $i++) { 
                    $days++;
                }
            }
            if($hours < 10){
                $hours = "0$hours";
            }
            if($length = intval($months / 12)){
                $months = $months - (12 * $length);
                for ($i=1; $i <= $length; $i++) { 
                    $years++;
                }
            }
            if($length = intval($days / ($daysOfTheMonths[$months] + 1))){
                $days = $days - (($daysOfTheMonths[$months] + 1) * $length);
                for ($i=1; $i <= $length; $i++) { 
                    $months++;
                }
            }
            if($days < 10){
                if ($days < 1) {
                    $days = 1;
                }
                $days = "0$days";
            }
            if($length = intval($months / 13)){
                $months = $months - (13 * $length);
                for ($i=1; $i <= $length; $i++) { 
                    $years++;
                }
            }
            if($months < 10){
                if ($months < 1) {
                    $months = 1;
                }
                $months = "0$months";
            }
            $end_time = Carbon::parse("$years/$months/$days $hours:$minutes:$seconds")->toDateTimeString();
            
            if($now > $end_time){
                // print_r($now);
                // print_r(' - ');
                // print_r($end_time);
                // die();
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'Exam ended',
                ]);
                return redirect("/logout");
            }
            
            return $next($request);
        }
    }