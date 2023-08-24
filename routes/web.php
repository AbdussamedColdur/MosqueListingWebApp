<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Camii;
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


Route::get('/',[Camii::class,'goster2'] );
Route::get('/filitre',[Camii::class,'goster'] );
Route::get('/ltf/{id}',[Camii::class,'detayli'] );
Route::get('log', [Camii::class, 'storeLog']);
