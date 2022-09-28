<?php

use App\Jobs\QueueJob;
use App\Mail\SendEmailTest;
use App\Http\Controllers\TestController;
use App\Http\Controllers\GoutteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PusherNotificationController;
use App\Http\Controllers\WebNotificationController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testFunction', [TestController::class, 'testFunction']);
Route::get('/web-scraping-in-laravel', [GoutteController::class, 'doWebScraping']);

Route::get('/notification', function () {
    return view('notification');
});
 
Route::get('send/{str}',[PusherNotificationController::class, 'notification']);
Route::get('sendNotification',[PusherNotificationController::class, 'sendNotification']);

// Route::get('sendEmail',function(){
//     $details['email'] = 'vineet.quadtrics@gmail.com';
//     dispatch(new QueueJob());
// });

Auth::routes();
Route::get('/push-notificaiton', [WebNotificationController::class, 'index'])->name('push-notificaiton');
Route::post('/store-token', [WebNotificationController::class, 'storeToken'])->name('store.token');
Route::post('/send-web-notification', [WebNotificationController::class, 'sendWebNotification'])->name('send.web-notification');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
