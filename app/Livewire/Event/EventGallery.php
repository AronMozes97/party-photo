<?php

namespace App\Livewire\Event;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use App\Models\EventPhoto as EventPhotoModel;

class EventGallery extends Component
{
    public $photos = [];
    public function render()
    {
        $this->photos = Storage::disk('public')->files('generated');

        $this->photos = collect($this->photos)->map(function ($path) {
            return asset("storage/$path");
        });

        #$this->photos = EventPhotoModel::where('event_id', session()->get('event_id'))->get();

        return view('livewire.event.event-gallery');
    }
}
