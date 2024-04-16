<?php

namespace App\Filament\Company\Resources\JobListingResource\Pages;

use App\Filament\Company\Resources\JobListingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateJobListing extends CreateRecord
{
    protected static string $resource = JobListingResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['company_id'] = auth()->user()->company->id;

        return $data;
    }
}
