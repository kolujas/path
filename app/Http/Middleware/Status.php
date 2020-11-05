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