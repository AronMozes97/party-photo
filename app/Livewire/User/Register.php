<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\EventMember as PartyMemberModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use Livewire\Component;

class Register extends Component
{
    public ?User $user = null;

    public ?string $name = null;
    public ?string $password = null;
    public ?string $password_confirmation = null;
    public ?string $email = null;

    public function mount(): void
    {
        $this->user = new User();

        if (session()->has('event_member_id')) {
            $this->name = PartyMemberModel::where('id', session()->get('event_member_id'))->first()?->name;
        }
    }

    public function register(): void
    {
        $this->validate([
            'name'     => 'required|min:2|max:50',
            'password' => 'required|confirmed:password_confirmation|min:8|regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/',
            'email'    => 'required|email|unique:users',
        ]);

        $this->user = User::create([
            'name'     => $this->name,
            'email'    => $this->email,
            'password' => Hash::make($this->password),
        ]);

        Auth::login($this->user);

        $this->redirect(route('dashboard'));
    }

    public function render(): View
    {
        return view('livewire.user.register');
    }
}
