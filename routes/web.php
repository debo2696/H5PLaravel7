<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LibraryController;
use App\Http\Controllers\H5pController;
use App\Http\Controllers\EmbedController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\DownloadController;





//use App\Http\Controllers\H5PC;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin/h5p')->group(function () {
    Route::group(['middleware' => ['web']], function () {
        if (config('laravel-h5p.use_router') == 'EDITOR' || config('laravel-h5p.use_router') == 'ALL') {
            Route::resource('h5p', "H5pController");
            
            //Route::group(['middleware' => ['auth']], function () {
                Route::get('library',"LibraryController@index")->name('h5p.library.index');
            
            //});
            }
    });
});
Route::get('/', function () {
    return view('welcome');
});

/*Route::prefix('admin/h5p')->group(function () {
    Route::group(['middleware' => ['web']], function () {
        if (config('laravel-h5p.use_router') == 'EDITOR' || config('laravel-h5p.use_router') == 'ALL') {
            Route::resource('h5p', "EscolaSoft\LaravelH5p\Http\Controllers\H5pController");
            Route::group(['middleware' => ['auth']], function () {
                Route::get(
                    'library',
                    "EscolaSoft\LaravelH5p\Http\Controllers\LibraryController@index"
                )->name('h5p.library.index');
            });
        }


     });
});*/

//Route::group(['middleware' => ['auth']], function () {
    
//Route::get('h5p/embed/{id}', 'EscolaSoft\LaravelH5p\Http\Controllers\EmbedController')->name('h5p.embed.client');