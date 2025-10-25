<?php

namespace App\Livewire\Party;

use App\Models\Party as PartyModel;
use App\Models\PartyMember as PartyMemberModel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Livewire\Component;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class PartyJoinLanding extends Component
{
    public PartyModel $party;
    public PartyMemberModel $member;
    public string $name = '';

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function mount(string $token): void
    {
        $this->party = PartyModel::where('join_token', $token)->firstOrFail();

        if (!$this->party->isActive()) {
            //todo majd hibakod hozzaadasa
            abort(404);
        }

        session()->put('party_id', $this->party->id);

        if (session()->has('party_member_code')) {
            $this->member = PartyMemberModel::where('party_id', $this->party->id)
                ->where('code', session()->get('party_member_code'))
                ->firstOrFail();

            $this->name = $this->member->name;
        } else {
            $this->member = PartyMemberModel::create([
                'party_id' => $this->party->id,
            ]);
        }
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

        session()->put('party_member_code', $this->member->code);

        session()->put('party_member_id', $this->member->id);

        session()->flash('success', 'Sikeresen csatlakoztál a partyhoz!');
    }

    public function startParty(): RedirectResponse
    {
        return redirect()->route('party.photo.create');
    }

    public function render(): View
    {
        return view('livewire.party.party-join-landing');
    }
}
