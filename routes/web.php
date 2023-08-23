<?php

use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $page = \App\Models\Page::find(1);
    return redirect('/glavnaya');
});

Route::post('/send_form/{id}', [PageController::class, 'sendFormData']);
Route::post('/send_quest/{id}', 'PageController@sendQuestData');
Route::get('/company-news/{id?}', 'NewsController@showAll');
Route::get('/company-new/{id?}', 'NewsController@show');
