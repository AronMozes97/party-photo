<?php

namespace App\Livewire\Event;

use App\Models\EventMember as EventMemberModel;
use App\Services\ImageGenerator;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\EventPhoto as EventPhotoModel;

class EventPhoto extends Component
{
    use WithFileUploads;

    #[Validate('required|image|max:5120')]
    public $photo;

    public string $theme = 'neon club vibes';
    public ?string $generatedUrl = null;
    public bool $busy = false;

    public ?EventMemberModel $member = null;

    public function render()
    {
        return view('livewire.event.event-photo');
    }

    public function saveAndGenerate(ImageGenerator $aiImageService) {
        $this->validate();

        $this->busy = true;

        $path = $this->photo->store('selfies', 'public');
        $absolutePath = storage_path("app/public/$path");

        $this->generatedUrl = $aiImageService->generateFromSelfie($absolutePath, $this->theme);

        if (!$this->member) {
            $this->member = EventMemberModel::where('event_id', session()->get('event_id'))
            ->where('code', session()->get('event_member_code'))
            ->first();
        }

        EventPhotoModel::create([
            'event_id' => session()->get('event_id'),
            'member_id' => $this->member->id,
            'image_path' => $this->generatedUrl,
        ]);

        $this->busy = false;
    }
}
