<?php

namespace App\Livewire\Auth;

use App\Enums\AccountType;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rule;
use Livewire\Component;

class Register extends Component
{
    /** @var string */
    public $email = '';

    /** @var string */
    public $password = '';

    /** @var string */
    public $accountType = '';

    public function register()
    {
        $this->validate([
            'email' => ['required', 'email', 'unique:users'],
            'password' => ['required', 'min:8'],
            'accountType' => ['required', Rule::in(AccountType::cases())],
        ]);

        $user = User::create([
            'username' => 'user' . time(),
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'account_type' => $this->accountType,
        ]);

        event(new Registered($user));

        Auth::login($user, true);

        return redirect()->intended(route('home'));
    }

    public function render()
    {
        return view('livewire.auth.register')->extends('layouts.blank');
    }
}
