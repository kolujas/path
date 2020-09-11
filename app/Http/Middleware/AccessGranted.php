<?php
    namespace App\Http\Middleware;

    use Auth;
    use Closure;

    class AccessGranted{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next){
            $user = Auth::user();
            
            return $next($request);
        }
    }