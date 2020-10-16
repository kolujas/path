<?php
    use Illuminate\Support\Facades\Route;

    /** 
     * ! AuthController
     */
    Route::get('/', 'AuthController@showLogin')->name('web.index');
    Route::get('/login', 'AuthController@showLogin')->name('auth.showLogin');
    Route::post('/login', 'AuthController@doLogIn')->name('auth.doLogIn');
    // Route::middleware('auth.guards')->group(function(){
        Route::get('/logout', 'AuthController@doLogOut')->name('auth.doLogOut');

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
            Route::post('/exams/create', 'ExamController@doCreate')->name('exam.doCreate');
            Route::put('/exams/{id_exam}/edit', 'ExamController@doEdit')->name('exam.doEdit');
            Route::delete('/exams/{id_exam}/delete', 'ExamController@doDelete')->name('exam.doDelete');
            Route::get('/panel/exams', 'ExamController@panel')->name('exam.panel');
        // });
        
    /** 
     * ! RecordController
     */
        // Route::middleware('student')->group(function(){
            // Route::middleware('scheduled_date_time')->group(function(){
                // Route::middleware('evaluation_confirmed')->group(function(){
                    Route::post('/exam/{id_exam}/record', 'RecordController@doCreate')->name('record.doCreate');
                // });
            // });
        // });
        // Route::middleware('admin')->group(function(){
            Route::get('/panel/records', 'RecordController@panel')->name('record.panel');
    /** 
     * ! StorageController
     */
            Route::get('/storage/records/{id_record}/file', 'StorageController@showRecordFile')->name('storage.showRecordFile');
            Route::get('/storage/candidates/{id_candidate}/file', 'StorageController@showCandidateFile')->name('storage.showCandidateFile');
    /** 
     * ! CandidateController
     */
            Route::post('/candidates/create', 'CandidateController@doCreate')->name('candidate.doCreate');
            Route::put('/candidates/{id_candidate}/edit', 'CandidateController@doEdit')->name('candidate.doEdit');
            Route::delete('/candidates/{id_candidate}/delete', 'CandidateController@doDelete')->name('candidate.doDelete');
            Route::get('/panel/candidates', 'CandidateController@panel')->name('candidate.panel');
        // });
    // });