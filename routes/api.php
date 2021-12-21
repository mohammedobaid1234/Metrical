<?php

use App\Http\Controllers\Admin\ContactWithAdminController;
use App\Http\Controllers\Api\AccessTokenController;
use App\Http\Controllers\API\AmenityController;
use App\Http\Controllers\API\CommunityController;
use App\Http\Controllers\API\EnquiryController;
use App\Http\Controllers\API\EventController;
use App\Http\Controllers\API\NewsController;
use App\Http\Controllers\API\OfferController;
use App\Http\Controllers\API\PropertyController;
use App\Http\Controllers\API\RentController;
use App\Http\Controllers\API\StopOfferController;
use App\Http\Controllers\API\UserController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware(['localization'])->group(function () {
    Route::apiResource('communities', CommunityController::class);
    Route::apiResource('properties', PropertyController::class);
    Route::get('properties/status/{status}', [PropertyController::class, 'Status']);
    Route::get('properties/shortterm', [PropertyController::class, 'shortTerm']);
    Route::apiResource('rents', RentController::class);
    Route::apiResource('amenities', AmenityController::class);
    Route::apiResource('news', NewsController::class);
    Route::get('community/{id}/news', [NewsController::class, 'newsByCommunity']);
    Route::apiResource('events', EventController::class);
    Route::get('community/{id}/events', [EventController::class, 'eventsByCommunity']);
    Route::apiResource('enquiry', EnquiryController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('offers', OfferController::class);
    Route::post('stop-offer', [StopOfferController::class, 'store']);
});
//API (Amr Younis)



//Auth Request (Mohammed Obaid)
Route::post('auth/signUp', [AccessTokenController::class, 'signUp']);
Route::post('auth/code/send', [AccessTokenController::class, 'sendCode']);
Route::post('auth/code/check', [AccessTokenController::class, 'checkCode']);

Route::post('auth/password/before-update', [AccessTokenController::class, 'beforeUpdate']);
Route::post('auth/password/update', [AccessTokenController::class, 'updatePassword']);
Route::post('auth/tokens', [AccessTokenController::class, 'store']);
Route::delete('auth/tokens', [AccessTokenController::class, 'destroy'])
    ->middleware('auth:sanctum');

Route::post('auth/request/tenant', [AccessTokenController::class, 'requestAsTenant'])
    ->middleware('auth:sanctum');

Route::post('auth/request/owner', [AccessTokenController::class, 'requestAsOwner'])
    ->middleware('auth:sanctum');

Route::get('term',[AccessTokenController::class , 'terms']);   
Route::post('changePass',[AccessTokenController::class , 'changePass'])
    ->middleware('auth:sanctum');
    
Route::post('interested', [EventController::class , 'interested'])
    ->middleware('auth:sanctum');
    
Route::post('contact', [ContactWithAdminController::class , 'store'])
    ->middleware('auth:sanctum');  

Route::put('profile', [UserController::class , 'editProfile'])
    ->middleware('auth:sanctum');  

Route::get('profile', [UserController::class , 'showProfile'])
    ->middleware('auth:sanctum');    
