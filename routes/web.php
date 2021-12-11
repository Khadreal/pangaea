<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TopicController;

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

//Topic group route
Route::group( [ 'as' => 'topic.', ] , function () {
    Route::get( '/', [ TopicController::class, 'index' ] );
    Route::get( 'topics', [ TopicController::class, 'index' ] )->name( 'index' );
    Route::post( 'topics', [ TopicController::class, 'store' ] )->name( 'store' );
    Route::delete( 'topic/{param}', [ TopicController::class, 'delete' ] )->name( 'delete' );
});