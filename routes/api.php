<?php

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/extention', 'extention');

Route::apiResource('/background-image', 'background_image');

Route::apiResource('/shortcuts', 'shortcut');

Route::apiResource('/game','ManageGameController');

Route::apiResource('/support','ManageSupportController');
Route::apiResource('/cards','CardController');

Route::get('/v1/background/image/app/{ext_id}/random', 'restApi\backgroundImage@result');

Route::get('/v1/shortcuts/app/all','restApi\shortcutController@result');

Route::get('/v1/support/app/all','restApi\supportController@result');

Route::get('/v1/backgroun/app/{ext_id}/all/images','restApi\multiBackgroundController@result');

Route::get('/v1/game/app/all', 'restApi\gameController@result');
Route::get('/v1/card/app/all', 'restApi\cardController@result');




