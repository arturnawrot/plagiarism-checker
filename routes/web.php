<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlagiarismController;

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

Route::get('/tool', function () {
    return view('tool');
});

Route::post('/tool', [PlagiarismController::class, 'index']);

Route::get('/test/{query}', [PlagiarismController::class, 'index']);