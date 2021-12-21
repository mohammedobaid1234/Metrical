<?php

use App\Http\Controllers\Admin\CommunitiesController;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\API\CommunityController;
use App\Http\Controllers\EventsController;
use App\Models\Event;
use App\Models\Rent;
use App\Models\Tenant;
use App\Models\User;
use App\Notifications\SendReminderForEventNotification;
use Illuminate\Support\Carbon;
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
    $events =  Rent::with('tenet')->whereDate('to', Carbon::now()->addDays(7))->get();
        // return $events[0]->tenet;x
        foreach($events as $event){
            // return $event->property->name_en;
            // $user =  $event->tenet;
            // // return $event[0];
            // $user->notify(new SendReminderForEventNotification($eventx));
            // foreach($event->tenet as $user){
            //     // $user = User::find($user);
            //     return $user;
            //     // return $user;
            // //    return $event->property->name_en;
            // }
            
        }
    return view('welcome');
});

Route::get('admin-panel', function () {
    return view('admin.home.index');
});

Route::resource('admin/communities', CommunitiesController::class);
Route::resource('properties', PropertyController::class);
Route::resource('offers', OfferController::class);
Route::resource('admin/events', EventsController::class);
Route::resource('admin/news', NewsController::class);

Route::get('admin/binding-users', [UsersController::class, 'index'])->name('binding.users');
Route::get('admin/tenants-users', [UsersController::class, 'tenants'])->name('tenants.users');
Route::get('admin/owners-users', [UsersController::class, 'owners'])->name('owners.users');
Route::get('admin/binding-users/{id}', [UsersController::class, 'showBindingUser'])->name('binding.show');
Route::put('admin/binding-users/accept/{id}', [UsersController::class, 'acceptBinding'])->name('binding.accept');
Route::put('admin/binding-users/refuse/{id}', [UsersController::class, 'refuseBinding'])->name('binding.refuse');
