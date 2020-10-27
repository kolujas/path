<?php
    namespace App\Http\Middleware;

    use App\Exceptions\Handler;
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
            $id_exam = $request->route('id_exam');
            $exam = Exam::find($id_exam);

            $now = Carbon::now()->toDateTimeString();

            $date = explode(' ', $exam->scheduled_date_time)[0];
            $time = explode(' ', $exam->scheduled_date_time)[1];
            $hours = explode(':', $time)[0];
            $minutes = explode(':', $time)[1];
            $seconds = explode(':', $time)[2];
            foreach ($candidate->modules() as $module) {
                $module_time = explode(':', $module->time);
                $hours += $module_time[0];
                $minutes += $module_time[1];
                $seconds += $module_time[2];
            }
            if($request->route()->getName() == 'record.doCreate'){
                $minutes += 3;
            }
            if($minutes > 59){
                $minutes = $minutes - 60;
                $hours++;
            }
            if($minutes < 10){
                $minutes = "0$minutes";
            } 
            if($hours < 10){
                $hours = "0$hours";
            }
            if($seconds < 10){
                $seconds = "0$seconds";
            }
            $end_time = Carbon::parse("$date $hours:$minutes:$seconds")->toDateTimeString();

            if($now > $end_time){
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'Exam ended',
                ]);
                return redirect("/logout");
            }
            
            return $next($request);
        }
    }