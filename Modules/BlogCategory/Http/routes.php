<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\BlogCategory\Http\Controllers'], function()
{
	/*
     * For DataTables
     */
    Route::post('blogcategory/get', 'BlogCategoryTableController')->name('blogcategory.get');
    /*
     * User CRUD
     */
    Route::resource('blogcategory', 'BlogCategoryController');
});