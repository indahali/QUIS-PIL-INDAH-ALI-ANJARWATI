<?php

use App\Http\Controllers\Api\presentController;
use App\Http\Controllers\Api\notecontroller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('', [presentController::class, 'index']);
Route::resources([
    'presents' => presentController::class,
    'notes' => notecontroller::class,
]);
