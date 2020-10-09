<?php
    use Illuminate\Support\Facades\Route;

    /** 
     * ! AuthController
     */
    Route::get('/', 'AuthController@showLogin')->name('auth.showLogin');
    Route::post('/login', 'AuthController@doLogIn')->name('auth.doLogIn');
    // Route::middleware('auth.guards')->group(function(){
        Route::get('/logoff', 'AuthController@doLogOff')->name('auth.doLogOff');

    /** 
     * ! ExamController
     */
        // Route::middleware('student')->group(function(){
            Route::get('/exam/{id_exam}/rules', 'ExamController@rules')->name('exam.rules');
            Route::get('/exam/{id_exam}/finished', 'ExamController@finished')->name('exam.finished');
            // Route::middleware('scheduled_date_time')->group(function(){
                Route::post('/auth/exam/{id_exam}', 'ExamController@auth')->name('exam.auth');
                // Route::middleware('evaluation_confirmed')->group(function(){
                    Route::get('/exam/{id_exam}', 'ExamController@show')->name('exam.show');
                // });
            // });
        // });s
        // Route::middleware('admin')->group(function(){
            Route::post('/exam/create', 'ExamController@doCreate')->name('exam.doCreate');
            Route::put('/exam/{id_exam}/edit', 'ExamController@doEdit')->name('exam.doEdit');
            Route::get('/panel/exams', 'ExamController@panel')->name('exam.panel');
        // });
        
    /** 
     * ! RecordController
     */
        // Route::middleware('student')->group(function(){
            // Route::middleware('scheduled_date_time')->group(function(){
                // Route::middleware('evaluation_confirmed')->group(function(){
                    Route::post('/exam/{id_exam}/record', 'RecordController@doCreate')->name('record.doCreate');
                    Route::get('/pdf', 'RecordController@crealo')->name('record.crealo');
                // });
            // });
        // });
        // Route::middleware('admin')->group(function(){
            Route::get('/panel/records', 'RecordController@panel')->name('record.panel');
    /** 
     * ! CandidateController
     */
            Route::post('/candidate/create', 'CandidateController@doCreate')->name('candidate.doCreate');
            Route::put('/candidate/{id_candidate}/edit', 'CandidateController@doEdit')->name('candidate.doEdit');
            Route::get('/panel/candidates', 'CandidateController@panel')->name('candidate.panel');
        // });
    // });