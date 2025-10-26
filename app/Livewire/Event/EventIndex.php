<?php

namespace App\Livewire\Event;

use App\Models\Event as EventModel;
use Livewire\Component;

class EventIndex extends Component
{
    public ?EventModel $event = null;
    public ?string $joinUrl = null;

    public function mount($token): void
    {
        $this->event = EventModel::where('join_token', $token)->first();

        if (!$this->event) {
            $this->event = EventModel::find(1);

            if (!$this->event) {
                $this->event = EventModel::create([
                    'name' => 'Test Event',
                    'status' => 1,
                ]);

                $token = $this->event->join_token;
            }
        }

        $this->joinUrl = route('event.join', $token);
    }

    public function render()
    {
        return view('livewire.event.event-index');
    }
}
