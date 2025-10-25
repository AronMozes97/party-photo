<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public ?string $email = null;
    public ?string $password = null;

    public bool $remember = true;

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

        $this->redirect(route('dashboard'));
    }


    public function render()
    {
        return view('livewire.user.login');
    }
}
