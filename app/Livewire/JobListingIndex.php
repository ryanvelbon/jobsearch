<?php

namespace App\Livewire;

use App\Models\JobListing;
use Livewire\Component;
use Livewire\WithPagination;

class JobListingIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $listings = JobListing::query()
            ->with('company')
            ->published()
            ->paginate(5);

        return view('livewire.job-listing-index', [
            'listings' => $listings,
        ]);
    }
}
