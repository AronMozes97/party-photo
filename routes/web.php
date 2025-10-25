<?php

use App\Enums\PermissionEnum;
use App\Enums\RoleEnum;
use App\Http\Controllers\PartyJoinController;


use App\Http\Controllers\UserController;
use App\Livewire\Admin\CreateEvent;
use App\Livewire\Dashboard;
use App\Livewire\Party\PartyGallery;
use App\Livewire\Party\PartyIndex;
use App\Livewire\Party\PartyJoinLanding;
use App\Livewire\Party\PartyPhoto;
use App\Livewire\User\Login;
use App\Livewire\User\Register;
use Illuminate\Support\Facades\Route;

Route::get('/', Dashboard::class)->name('dashboard');

// Party join routes ->
Route::get('/event/party/join/{token}', PartyIndex::class)->name('party.index');
Route::get('/join/{token}', PartyJoinLanding::class)->name('party.join');

// Party photo routes ->
Route::get('/event/photo/create', PartyPhoto::class)->name('party.photo.create');

// Party gallery routes ->
Route::get('/event/gallery', PartyGallery::class)->name('party.gallery');

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
