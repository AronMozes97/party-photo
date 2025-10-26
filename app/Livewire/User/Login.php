<?php

namespace App\Livewire\User;

use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public ?string $email = null;
    public ?string $password = null;

    public bool $remember = true;

    public function mount(): void
    {
        $this->email = 'aron.mozes97@gmail.com';
        $this->password = env('ADMIN_PASSWORD');
    }

    public function login(): void
    {
        $this->validate([
            'email'    => 'required|email',
            'password' => 'required|min:8',
        ]);

        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password], $this->remember)) {
            $this->addError('loginError', "Wrong email or password.");
            return;
        }

        session()->regenerate();

        $this->redirectIntended(route('dashboard'));
    }


    public function render(): View
    {
        return view('livewire.user.login');
    }
}
