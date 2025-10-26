<?php

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Controllers\PartyJoinController;


use App\Http\Controllers\UserController;
use App\Livewire\Admin\CreateEvent;
use App\Livewire\Dashboard;
use App\Livewire\Event\EventGallery;
use App\Livewire\Event\EventIndex;
use App\Livewire\Event\EventJoinLanding;
use App\Livewire\Event\EventPhoto;
use App\Livewire\User\Login;
use App\Livewire\User\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');

// Event join routes ->
Route::get('/event/event/join/{token}', EventIndex::class)->name('event.index');
Route::get('/join/{token}', EventJoinLanding::class)->name('event.join');

// Event photo routes ->
Route::get('/event/photo/create', EventPhoto::class)->name('event.photo.create');

// Event gallery routes ->
Route::get('/event/gallery', EventGallery::class)->name('event.gallery');

//User routes ->
Route::get('user/register', Register::class)->name('user.register');
Route::get('user/login', Login::class)->name('user.login');
Route::get('user/logout', [UserController::class, 'logout'])->name('user.logout');

//Alias rout for login ->
Route::get('login', Login::class)->name('login');

// Admin routes ->
Route::middleware(['auth', RoleEnum::ADMIN->getMiddleware()])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('admin/create/event', CreateEvent::class)
            ->name('create.event')
            ->middleware(PermissionEnum::CREATE_EVENT->getMiddleware());
    });
