<?php

namespace App\Livewire\Party;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\PartyPhoto as PartyPhotoModel;

class PartyGallery extends Component
{
    public $photos = [];
    public function render()
    {
//        $this->photos = Storage::disk('public')->files('generated');
//
//        $this->photos = collect($this->photos)->map(function ($path) {
//            return asset("storage/$path");
//        });

        $this->photos = PartyPhotoModel::where('party_id', session()->get('party_id'))->get();

        return view('livewire.party.party-gallery');
    }
}
