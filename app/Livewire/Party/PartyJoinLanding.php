<?php

namespace App\Livewire\Party;

use App\Models\Party as PartyModel;
use App\Models\PartyMember as PartyMemberModel;
use Livewire\Component;

class PartyJoinLanding extends Component
{
    public PartyModel $party;
    public PartyMemberModel $member;
    public string $name = '';

    public function mount(string $token): void
    {
        $this->party = PartyModel::where('join_token', $token)->firstOrFail();

        if (!$this->party->isActive()) {
            //todo majd hibakod hozzaadasa
            abort(404);
        }

        $this->member = PartyMemberModel::create([
            'party_id' => $this->party->id,
        ]);
    }

    public function joinParty(): void
    {
        $this->validate([
            'name' => 'required|min:2|max:50',
        ]);

        $this->member->update([
            'name' => $this->name,
            'joined_at' => now(),
        ]);

        session('memberCode', $this->member->code);

        session()->flash('success', 'Sikeresen csatlakoztál a partyhoz!');
    }

    public function render()
    {
        return view('livewire.party.party-join-landing');
    }
}
