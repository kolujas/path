<?php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::middleware('api')->group(function(){
        Route::get('/server/time', 'API\ServerController@currentTime')->name('server.currentTime');
        Route::get('/server/enviroment', 'API\ServerController@enviroment')->name('server.enviroment');
    /** 
     * ! AuthController
     */
        Route::post('/login', 'API\AuthController@doLogIn')->name('auth_api.doLogIn');
    /** 
     * ! EvaluationController
     */
        Route::middleware(['auth:candidates_api','scope:candidates_api'])->group(function(){
            Route::get('/evaluation/{id_evaluation}', 'API\EvaluationController@get')->name('evaluation.get');
    /** 
     * ! RecordController
     */
            Route::post('/exam/{id_evaluation}/record', 'API\RecordController@save')->name('record.save');
        });
        Route::get('/records', 'API\RecordController@getAll')->name('record.getAll');
    });