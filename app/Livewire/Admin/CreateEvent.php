<?php

namespace App\Livewire\Admin;

use App\Enums\RoleEnum;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Livewire\Component;
use Illuminate\Support\Collection;
use App\Models\Event as EventModel;

class CreateEvent extends Component
{
    public ?string $name = null;
    public ?int $owner_user_id = null;
    public ?Collection $users = null;
    public ?Carbon $start_at = null;

    public function mount(): void
    {
        $this->start_at = Carbon::now()->addDay();

        $this->users = User::whereHas('roles', function ($query) {
            $query->where('name', RoleEnum::USER->value);
        })->orderBy('name')->get();
    }

    public function createEvent(): void
    {
        $this->validate([
            'name'          => 'required|min:2|max:50',
            'start_at'      => 'required|date',
            'owner_user_id' => 'required|exists:users,id',
        ]);

        $expire_at = $this->start_at->copy()->addHours(4);

        EventModel::create([
            'name'          => $this->name,
            'start_at'      => $this->start_at,
            'owner_user_id' => $this->owner_user_id,
            'expire_at'     => $expire_at,
            'status'        => Event::STATUS_INACTIVE,
        ]);
    }

    public function render(): View
    {
        return view('livewire.admin.create-event');
    }
}
