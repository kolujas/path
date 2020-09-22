<?php
    namespace App\Http\Middleware;

    use Auth;
    use Closure;

    class Administrator{
        /**
         * Handle an incoming request.
         *
         * @param  \Illuminate\Http\Request  $request
         * @param  \Closure  $next
         * @return mixed
         */
        public function handle($request, Closure $next){
            $user = Auth::user();
            if($user && $user->role()->id_role == 1){
                return $next($request);
            }else{
                return redirect()->route('auth.showLogin');
            }
        }
    }