<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Blog\Http\Controllers'], function()
{
	/*
     * For DataTables
     */
    Route::post('blog/get', 'BlogTableController')->name('blog.get');
    /*
     * User CRUD
     */
    Route::resource('blog', 'BlogController');

    Route::get('blog-image-upload/{blog}', 'BlogController@imageUpload')->name('blog.image_upload');

    Route::any('blog-image-file/{id}','BlogController@imageUploadFile')->name('blog.image_upload_file');    
});