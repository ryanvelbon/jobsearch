<?php

namespace App\Livewire;

use App\Models\JobListing;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class JobListingIndex extends Component
{
    use WithPagination;

    #[Url( as: 'q' )]
    public $search = '';

    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $listings = JobListing::search($this->search)
            ->with('company', 'tags')
            ->published()
            ->paginate(10);

        return view('livewire.job-listing-index', [
            'listings' => $listings,
        ]);
    }
}
