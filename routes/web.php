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

// главная (воронка)
Route::get('/about', function () {
    return view('about');
})->name('about');

use App\Http\Controllers\FrontendController;
// страница мероприятий
Route::match(['get', 'post'], '/', [FrontendController::class, 'general'])->name('events');

use App\Http\Controllers\AdminController;
// страницы администратора
Route::match(['get', 'post'], '/admin/events/publisher/273076', [AdminController::class, 'eventsPublisher'])->name('admin');
Route::match(['get', 'post'], '/admin/event/{id}/update/273076/', [AdminController::class, 'eventUpdate']);


// эксперимент с сервис-контейнерами и сервис-провайдерами
Route::get('/e', [App\Http\Controllers\EduContainerController::class, 'abstract']);
