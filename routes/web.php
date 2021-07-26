<?php

use App\Http\Controllers\Retweet;
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
    return view('tweet');
});

Route::get(
    'tweet',
    [Retweet::class, 'run']
);

Route::get(
    'list',
    [Retweet::class, 'tweets']
);

Route::get(
    'heart',
    [Retweet::class, 'heart']
);

Route::get(
    'retweet',
    [Retweet::class, 'retweethashtag']
);