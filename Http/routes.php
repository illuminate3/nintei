<?php

Route::group(['middleware' => 'web', 'prefix' => 'nintei', 'namespace' => 'Modules\Nintei\Http\Controllers'], function()
{
    Route::get('/', 'NinteiController@index');
});
