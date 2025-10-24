<?php

namespace App\Livewire\Party;

use App\Models\Party as PartyModel;
use Livewire\Component;

class PartyIndex extends Component
{
    public ?PartyModel $party = null;
    public ?string $joinUrl = null;

    public function mount($token): void
    {
        $this->party = PartyModel::where('join_token', $token)->first();

        if (!$this->party) {
            $this->party = PartyModel::find(1);

            if (!$this->party) {
                $this->party = PartyModel::create([
                    'name' => 'Test Party',
                    'status' => 1,
                ]);

                $token = $this->party->join_token;
            }
        }

        $this->joinUrl = route('party.join', $token);
    }

    public function render()
    {
        return view('livewire.party.party-index');
    }
}
