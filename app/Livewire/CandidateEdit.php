<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;

class CandidateEdit extends Component
{
    #[Validate('required|unique:users|alpha_num:ascii|min:3|max:30')]
    public $username;

    #[Validate('required|min:2|max:25|regex:/^[a-z ,.\'-]+$/i')]
    public $firstName;

    #[Validate('required|min:2|max:25|regex:/^[a-z ,.\'-]+$/i')]
    public $lastName;

    #[Validate('required|in:m,f,x', as: 'gender')]
    public $sex;

    #[Validate('required', as: 'birthday')]
    public $dob;

    #[Validate('max:300')]
    public $bio;

    public function mount()
    {
        $user = auth()->user();
        $profile = $user->candidate;

        $this->username = $user->username;
        $this->firstName = $profile->first_name;
        $this->lastName = $profile->last_name;
        $this->sex = $profile->sex;
        $this->dob = $profile->dob?->format('Y-m-d');
        $this->bio = $profile->bio;
    }

    public function update()
    {
        $this->validate();

        auth()->user()->update(['username' => $this->username]);

        auth()->user()->candidate->update([
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'sex' => $this->sex,
            'dob' => $this->dob,
            'bio' => $this->bio,
        ]);

        session()->flash('success', 'Profile successfully updated.');
    }


    public function render()
    {
        return view('livewire.candidate-edit');
    }
}
