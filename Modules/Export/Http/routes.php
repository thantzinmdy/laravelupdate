<?php

Route::group(['middleware' => ['web','admin'], 'as' => 'admin.', 'prefix' => 'admin', 'namespace' => 'Modules\Export\Http\Controllers'], function()
{
    /*
     * Export Routes
     */
    Route::get('export', 'ExportController@index')->name('export.index');
    Route::post('export/preview', 'ExportController@preview')->name('export.preview');
    Route::post('export/download', 'ExportController@export')->name('export.download');
});