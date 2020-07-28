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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/rbmq', 'SimpleRabbitMQController@index');
Route::get('/sendEmail', 'SimpleRabbitMQController@useQueueManager');


Route::get('/producerSimple', 'SimpleRabbitMQController@producerSimple');
Route::get('/consumerSimple', 'SimpleRabbitMQController@consumerSimple');

Route::get('/producer', 'SimpleRabbitMQController@producer');
Route::get('/consumer', 'SimpleRabbitMQController@consumer');
