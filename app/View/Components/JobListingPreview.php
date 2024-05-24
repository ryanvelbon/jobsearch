<?php

namespace App\View\Components;

use Closure;
use App\Models\JobListing;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class JobListingPreview extends Component
{
    public function __construct(
        public int $id,
    ) {}

    public function render(): View|Closure|string
    {
        $listing = JobListing::findOrFail($this->id);

        return view('components.job-listing-preview', [
            'listing' => $listing,
        ]);
    }
}
