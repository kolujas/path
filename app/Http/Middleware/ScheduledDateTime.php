<?php
    namespace App\Http\Middleware;

    use App\Models\Exam;
    use Carbon\Carbon;
    use Closure;

    class ScheduledDateTime{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next){
            $id_exam = $request->route('id_exam');
            $exam = Exam::find($id_exam);
            $now = Carbon::now()->toDateString();
            if($now < $exam->scheduled_date_time){
                return redirect("/exam/$id_exam/rules");
            }
            
            return $next($request);
        }
    }