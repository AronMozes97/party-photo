<?php

namespace App\Livewire\Party;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class PartyGallery extends Component
{
    public $photos = [];
    public function render()
    {
        $this->photos = Storage::disk('public')->files('generated');

        $this->photos = collect($this->photos)->map(function ($path) {
            return asset("storage/$path");
        });

        return view('livewire.party.party-gallery');
    }
}
