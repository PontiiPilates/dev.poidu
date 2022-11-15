<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

use App\Http\Controllers\FrontendController;
Route::match(['get', 'post'], '/', [FrontendController::class, 'general']);

use App\Http\Controllers\AdminController;
Route::match(['get', 'post'], '/admin/events/publisher/273076', [AdminController::class, 'eventsPublisher']);
Route::match(['get', 'post'], '/admin/event/{id}/update/273076/', [AdminController::class, 'eventUpdate']);

/**
 * Соглашения
 */

// Если происходит выбор мероприятий по тегу, то адресная строка будет принимать get-параметр "tag", значение которого представляет идентификатор тега