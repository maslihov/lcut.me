<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Link;

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
    return view('main');
});

Route::get('/{link:link_id}', [Link::class, 'redirect']);

Route::get('/{link:link_id}/info', [Link::class, 'info']);