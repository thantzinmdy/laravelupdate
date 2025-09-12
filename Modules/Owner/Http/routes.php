<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Owner\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('owner/get', 'OwnerTableController')->name('owner.get');
            /*
             * User CRUD
             */
            Route::resource('owner', 'OwnerController');
});