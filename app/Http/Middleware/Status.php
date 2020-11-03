<?php
    namespace App\Http\Middleware;

    use App\Models\Evaluation;
    use Auth;
    use Closure;

    class Status{
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

            if(!$evaluation = Evaluation::where([['id_exam', '=', $evaluation->id_exam], ['id_candidate', '=', $candidate->id_candidate]])->get()){
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'Evaluation not found.',
                ]);
                return redirect("/logout");
            }

            $evaluation = $evaluation[0];

            if($evaluation->id_status > 0){
                $request->session()->put('error', [
                    'code' => 200,
                    'message' => 'Exam completed.',
                ]);
                return redirect("/logout");
            }

            return $next($request);
        }
    }