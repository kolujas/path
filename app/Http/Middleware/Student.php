<?php
    namespace App\Http\Middleware;

    use App\Models\Evaluation;
    use App\Models\Exam;
    use Auth;
    use Closure;

    class Student{
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

            if($evaluation->id_candidate == $candidate->id_candidate){
                return $next($request);
            }else{
                $request->session()->put('error', [
                    'code' => 403,
                    'message' => 'You are not a Candidate in this Exam.',
                ]);
                return redirect('/');
            }
        }
    }