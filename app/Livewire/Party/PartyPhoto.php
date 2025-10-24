<?php

namespace App\Livewire\Party;

use App\Services\ImageGenerator;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;

class PartyPhoto extends Component
{
    use WithFileUploads;

    #[Validate('required|image|max:5120')]
    public $photo;

    public string $theme = 'neon club vibes';
    public ?string $generatedUrl = null;
    public bool $busy = false;

    public function render()
    {
        return view('livewire.party.party-photo');
    }

    public function saveAndGenerate(ImageGenerator $aiImageService) {
        $this->validate();

        $this->busy = true;

        $path = $this->photo->store('selfies', 'public');
        $absolutePath = storage_path("app/public/$path");

        $this->generatedUrl = $aiImageService->generateFromSelfie($absolutePath, $this->theme);

        $this->busy = false;
    }
}
