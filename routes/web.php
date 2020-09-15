<?php
    use Illuminate\Support\Facades\Route;

/** AuthController */
    Route::get('/', 'AuthController@showLogin')->name('auth.showLogin');
    Route::post('/login', 'AuthController@doLogin')->name('auth.doLogin');

/** ExamController */
    // Route::middleware('auth')->group(function(){
    //     Route::middleware('access_granted')->group(function(){
            Route::get('/exam/{id_exam}', 'ExamController@show')->name('exam.show');
        // });
            Route::get('/rules', 'ExamController@rules')->name('exam.rules');
        
/** UserController */
        Route::post('/user/create', 'UserController@doCreate')->name('user.doCreate');
        Route::put('/user/{id_user}/edit', 'UserController@doEdit')->name('user.doEdit');

/** WebController */
        Route::get('/panel', 'WebController@panel')->name('web.panel');
    // });