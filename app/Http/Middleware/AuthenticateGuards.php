<?php
    namespace App\Http\Middleware;

    use Auth;
    use Closure;

    class AuthenticateGuards{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next){
            if(!Auth::guard('candidates')->user() && !Auth::user()){
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'Log in first to access your exam.',
                ]);
                return redirect('/');
            }
            return $next($request);
        }
    }