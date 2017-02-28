<?php

Route::group(['middleware' => 'api', 'prefix' => 'api', 'namespace' => 'Modules\Api\Http\Controllers'], function()
{
    Route::get('/', 'ApiController@index');

    Route::post('/account/register', 'AccountController@register');

    Route::get('/pets', 'PetController@index')->middleware('auth:api');

    Route::post('/pets', 'PetController@create')->middleware('auth:api');

    Route::put('/pets/{id}', 'PetController@update')->middleware('auth:api');
});
