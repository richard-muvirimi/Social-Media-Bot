<?php

use App\Http\Controllers\Facebook;
use App\Http\Controllers\Twitter;
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
    return view('twitter');
});

Route::get(
    'tweet',
    [Twitter::class, 'tweet']
);

Route::get(
    'random',
    [Twitter::class, 'random']
);

Route::get(
    'search',
    [Twitter::class, 'search']
);

Route::get(
    'favourite',
    [Twitter::class, 'favourite']
);

Route::get(
    'retweet',
    [Twitter::class, 'retweet']
);

Route::get(
    'comment',
    [Twitter::class, 'comment']
);

Route::get(
    'delete',
    [Twitter::class, 'delete']
);

Route::get(
    "facebook",
    [Facebook::class, "profile"]
);
