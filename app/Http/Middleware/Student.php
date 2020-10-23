<?php
    namespace App\Http\Middleware;

    use App\Models\Exam;
    use App\Models\Evaluation;
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
            $exam = Exam::find($request->route('id_exam'));
            $isStudent = false;
            foreach ($exam->candidates() as $candidate) {
                if($candidate->id_candidate == $candidate->id_candidate){
                    $isStudent = true;
                }
            }

            if($isStudent){
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