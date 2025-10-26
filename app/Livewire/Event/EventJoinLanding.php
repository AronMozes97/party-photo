<?php

namespace App\Livewire\Event;

use App\Models\Event as EventModel;
use App\Models\EventMember as EventyMemberModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class EventJoinLanding extends Component
{
    public EventModel $event;
    public EventyMemberModel $member;
    public string $name = '';

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function mount(string $token): void
    {
        $this->event = EventModel::where('join_token', $token)->firstOrFail();

        if (!$this->event->getStatus() != EventModel::STATUS_ACTIVE && false) {
            //todo majd hibakod hozzaadasa
            abort(404);
        }

        session()->put('event_id', $this->event->id);

        if (session()->has('event_member_code')) {
            $this->member = EventyMemberModel::where('event_id', $this->event->id)
                ->where('code', session()->get('event_member_code'))
                ->firstOrFail();

            $this->name = $this->member->name;
        } else {
            $this->member = EventyMemberModel::create([
                'event_id' => $this->event->id,
            ]);
        }
    }

    public function joinEvent(): void
    {
        $this->validate([
            'name' => 'required|min:2|max:50',
        ]);

        $this->member->update([
            'name' => $this->name,
            'joined_at' => now(),
        ]);

        session()->put('event_member_code', $this->member->code);

        session()->put('event_member_id', $this->member->id);

        session()->flash('success', 'Sikeresen csatlakoztál a eventhez!');
    }

    public function startEvent(): RedirectResponse
    {
        return redirect()->route('event.photo.create');
    }

    public function render(): View
    {
        return view('livewire.event.event-join-landing');
    }
}
