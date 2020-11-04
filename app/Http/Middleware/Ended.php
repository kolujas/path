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
            $hours = explode(':', $time)[0];
            $minutes = explode(':', $time)[1];
            foreach ($candidate->modules() as $module) {
                $module_time = explode(':', $module->time);
                $hours += $module_time[0];
                $minutes += $module_time[1];
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
            $end_time = Carbon::parse("$date $hours:$minutes:00")->toDateTimeString();

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