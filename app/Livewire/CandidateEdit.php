<?php

namespace App\Livewire;

use Livewire\Component;

class CandidateEdit extends Component
{
    public $username;
    public $firstName;
    public $lastName;
    public $sex;
    public $dob;
    public $bio;

    public function mount()
    {
        $user = auth()->user();
        $profile = $user->candidate;

        $this->username = $user->username;
        $this->firstName = $profile->first_name;
        $this->lastName = $profile->last_name;
        $this->sex = $profile->sex;
        $this->dob = $profile->dob->format('Y-m-d');
        $this->bio = $profile->bio;
    }


    public function render()
    {
        return view('livewire.candidate-edit');
    }
}
