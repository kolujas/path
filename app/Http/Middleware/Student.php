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
            $user = Auth::user();
            $exam = Exam::find($request->route('id_exam'));
            $isStudent = false;
            foreach ($exam->students as $student) {
                if($user->id_user == $student->id_user){
                    $isStudent = true;
                }
            }

            if($isStudent){
                return $next($request);
            }else{
                return redirect()->route('auth.showLogIn')->with('status', [
                    'code' => 403,
                    'message' => 'You are not a student from this exam.',
                ]);
            }
        }
    }