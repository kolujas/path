<?php
    use Illuminate\Support\Facades\Route;

/** AuthController */
    Route::get('/', 'AuthController@showLogin')->name('auth.showLogin');
    Route::post('/', 'AuthController@doLogin')->name('auth.doLogin');

/** ExamController */
    Route::get('/exam1', 'ExamController@exam1')->name('exam.exam1');

/** UserController */
    Route::post('/user/create', 'UserController@doCreate')->name('user.doCreate');
    Route::put('/user/{id_user}/edit', 'UserController@doEdit')->name('user.doEdit');

/** WebController */
    Route::get('/panel', 'WebController@panel')->name('web.panel');