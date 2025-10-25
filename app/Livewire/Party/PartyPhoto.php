<?php

namespace App\Livewire\Party;

use App\Models\PartyMember as PartyMemberModel;
use App\Services\ImageGenerator;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\PartyPhoto as PartyPhotoModel;

class PartyPhoto extends Component
{
    use WithFileUploads;

    #[Validate('required|image|max:5120')]
    public $photo;

    public string $theme = 'neon club vibes';
    public ?string $generatedUrl = null;
    public bool $busy = false;

    public ?PartyMemberModel $member = null;

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

        if (!$this->member) {
            $this->member = PartyMemberModel::where('party_id', session()->get('party_id'))
            ->where('code', session()->get('party_member_code'))
            ->first();
        }

        PartyPhotoModel::create([
            'party_id' => session()->get('party_id'),
            'member_id' => $this->member->id,
            'image_path' => $this->generatedUrl,
        ]);

        $this->busy = false;
    }
}
