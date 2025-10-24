<?php

use App\Http\Controllers\PartyJoinController;


use App\Livewire\Party\PartyGallery;
use App\Livewire\Party\PartyIndex;
use App\Livewire\Party\PartyJoinLanding;
use App\Livewire\Party\PartyPhoto;
use Illuminate\Support\Facades\Route;

Route::get('/', PartyPhoto::class);

Route::get('/event/party/join/{token}', PartyIndex::class);
Route::get('/join/{token}', PartyJoinLanding::class)->name('party.join');

Route::get('/event/gallery', PartyGallery::class);
