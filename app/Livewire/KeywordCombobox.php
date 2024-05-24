<?php

namespace App\Livewire;

use Spatie\Tags\Tag;
use Livewire\Component;

class KeywordCombobox extends Component
{
    public $search = '';

    public function render()
    {
        if (strlen($this->search) >= 1) {
            $results = Tag::query()
                ->whereType('keyword')
                ->containing($this->search)
                ->get();
        } else {
            $results = collect();    
        }

        return view('livewire.keyword-combobox', [
            'results' => $results,
        ]);
    }
}
