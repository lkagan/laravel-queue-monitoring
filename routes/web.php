<?php

use App\Jobs\ProcessPodcast;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/queue', function () {
    for ($i = 0; $i < 100; $i++) {
        ProcessPodcast::dispatch();
    }

    for ($i = 0; $i < 25; $i++) {
        ProcessPodcast::dispatch()->onQueue('low');
    }

    return 'Done!';
});
