<?php

namespace App\Filament\Admin\Resources\JobListingResource\Pages;

use App\Filament\Admin\Resources\JobListingResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJobListings extends ListRecords
{
    protected static string $resource = JobListingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
