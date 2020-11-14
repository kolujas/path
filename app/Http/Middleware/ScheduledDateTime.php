<?php
    namespace App\Http\Middleware;

    use App\Models\Evaluation;
    use App\Models\Exam;
    use Auth;
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
            $candidate = Auth::guard('candidates')->user();
            $id_evaluation = $request->route('id_evaluation');
            $evaluation = Evaluation::find($id_evaluation);

            $now = Carbon::now()->toDateTimeString();
            
            if($now < $evaluation->exam->scheduled_date_time){
                print_r('Now: ' . $now);
                print_r('<br>');
                print_r('Scheduled date time: ' . $evaluation->exam->scheduled_date_time);
                die();
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'Exam did not start.',
                ]);
                return redirect("/exam/$evaluation->id_evaluation/rules");
            }
            
            return $next($request);
        }
    }