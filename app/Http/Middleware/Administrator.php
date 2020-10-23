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
            if(Auth::user()){
                return $next($request);
            }else{
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'User logged must be admin.',
                ]);
                return redirect('/logout');
            }
        }
    }