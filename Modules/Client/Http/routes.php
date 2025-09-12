<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Client\Http\Controllers'], function()
{
	/*
     * For DataTables
     */
    Route::post('client/get', 'ClientTableController')->name('client.get');
    /*
     * User CRUD
     */
    Route::resource('client', 'ClientController');
});