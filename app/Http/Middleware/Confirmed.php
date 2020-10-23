<?php
    namespace App\Http\Middleware;

    use App\Models\Evaluation;
    use Auth;
    use Closure;

    class Confirmed{
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

            if(!$evaluation = Evaluation::where([['id_exam', '=', $id_exam], ['id_candidate', '=', $candidate->id_candidate]])->get()){
                $request->session()->put('error', [
                    'code' => 404,
                    'message' => 'Evaluation not found.',
                ]);
                return redirect("/logout");
            }

            $evaluation = $evaluation[0];

            if($evaluation->confirmed <= 0){
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'Exam rules must be confirmed.',
                ]);
                return redirect("/exam/$id_exam/rules");
            }

            return $next($request);
        }
    }