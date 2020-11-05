<?php
    namespace App\Http\Middleware;

    use App\Models\Evaluation;
    use Closure;

    class AuthenticateIdEvaluation{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next){
            $id_evaluation = $request->route('id_evaluation');

            if(!$evaluation = Evaluation::find($id_evaluation)){
                $request->session()->put('error', [
                    'code' => 404,
                    'message' => 'This Evaluation does not exist.',
                ]);
                return redirect('/');
            }

            return $next($request);
        }
    }