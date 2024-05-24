<?php

namespace App\Livewire;

use App\Enums\WorkType;
use App\Models\JobListing;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class JobListingIndex extends Component
{
    use WithPagination;

    #[Url( as: 'q' )]
    public $search = '';

    #[Url( as: 'wt' )]
    public $selectedWorkTypes = [];

    #[Url( as: 'jobId' )]
    public $listingId;

    public function updated()
    {
        $this->resetPage();
    }

    public function render()
    {
        $listings = JobListing::search($this->search)
            ->with('company', 'tags')
            ->published()
            ->when($this->selectedWorkTypes, function($query) {
                $query->whereIn('work_type', $this->selectedWorkTypes);
            })
            ->orderBy('published_at', 'desc')
            ->paginate(10);

        return view('livewire.job-listing-index', [
            'listings' => $listings,
            'options' => [
                'workTypes' => WorkType::cases(),
            ],
        ]);
    }
}
