<?php
    use Illuminate\Support\Facades\Route;

    /** 
     * ! AuthController
     */
    Route::get('/', 'AuthController@showLogin')->name('auth.showLogin');
    Route::post('/login', 'AuthController@doLogIn')->name('auth.doLogIn');
    // Route::middleware('auth')->group(function(){
        Route::get('/logoff', 'AuthController@doLogOff')->name('auth.doLogOff');

    /** 
     * ! ExamController
     */
        // Route::middleware('student')->group(function(){
            Route::get('/exam/{id_exam}/rules', 'ExamController@rules')->name('exam.rules');
            // Route::middleware('scheduled_date_time')->group(function(){
                Route::post('/auth/exam/{id_exam}', 'ExamController@auth')->name('exam.auth');
                Route::get('/exam/{id_exam}', 'ExamController@show')->name('exam.show');
            // });
        // });
        
    /** 
     * ! UserController
     */
        // Route::middleware('admin')->group(function(){
            Route::post('/user/create', 'UserController@doCreate')->name('user.doCreate');
            Route::put('/user/{id_user}/edit', 'UserController@doEdit')->name('user.doEdit');

    /** 
     * ! WebController
     */
            Route::get('/panel', 'WebController@panel')->name('web.panel');
        // });
    // });