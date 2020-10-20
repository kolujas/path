<?php
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Route;

    Route::middleware('api')->group(function(){
    /** 
     * ! AuthController
     */
        Route::post('/login', 'API\AuthController@doLogIn')->name('auth_api.doLogIn');
    /** 
     * ! RecordController
     */
        Route::middleware(['auth:NAFIE','scope:NAFIE'])->group(function(){
            Route::post('/exam/{id_exam}/record', 'API\RecordController@save')->name('record.save');
        });
    });