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
            $id_evaluation = $request->route('id_evaluation');
            $evaluation = Evaluation::find($id_evaluation);

            if($evaluation->confirmed <= 0){
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'Exam rules must be confirmed.',
                ]);
                return redirect("/exam/$id_evaluation/rules");
            }

            return $next($request);
        }
    }