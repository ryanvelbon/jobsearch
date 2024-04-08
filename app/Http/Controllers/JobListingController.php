<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function show(JobListing $listing)
    {
        return view('pages.listings.show', [
            'listing' => $listing,
        ]);
    }
}
