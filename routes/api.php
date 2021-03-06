<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\TopicController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/test/{param-slug}', function () {
    return response('Test API', 200)
                  ->header('Content-Type', 'application/json');
});

// Subscribe to topic {topic} can be slug or id
Route::post( '/subscribe/{topicSlugOrTopicId}', [ TopicController::class, 'subscribe' ] );

//Publish message to topic
Route::post( '/publish/{topicSlugOrTopicId}', [ TopicController::class, 'publish' ] );