<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Agent\Http\Controllers'], function()
{
    		/*
             * For DataTables
             */
            Route::post('agent/get', 'AgentTableController')->name('agent.get');
            /*
             * User CRUD
             */
            Route::resource('agent', 'AgentController');
});