<?php

namespace App\Livewire;

use App\Enums\WorkType;
use App\Models\JobListing;
use Carbon\Carbon;
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

    #[Url]
    public $nDays;

    #[Url( as: 'jobId' )]
    public $listingId;

    public function updated($property)
    {
        if ($property !== 'listingId') {
            $this->resetPage();
        }
    }

    public function render()
    {
        $listings = JobListing::search($this->search)
            ->with('company', 'tags')
            ->published()
            ->when($this->selectedWorkTypes, function($query) {
                $query->whereIn('work_type', $this->selectedWorkTypes);
            })
            ->when($this->nDays, function($query) {
                $query->where('published_at', '>=' , Carbon::now()->subDays($this->nDays));
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
