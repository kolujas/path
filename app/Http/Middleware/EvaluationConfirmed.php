<?php
    namespace App\Http\Middleware;

    use App\Models\Evaluation;
    use Auth;
    use Closure;

    class EvaluationConfirmed{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next){
            $id_exam = $request->route('id_exam');
            $candidate = Auth::guard('candidates')->user();
            $evaluation = Evaluation::where([['id_exam', '=', $id_exam], ['id_candidate', '=', $candidate->id_candidate]])->get();
            $evaluation = $evaluation[0];

            if(!$evaluation->confirmed){
                return redirect("/exam/$id_exam/rules");
            }
            
            return $next($request);
        }
    }