<?php

namespace App\Filament\Company\Resources;

use App\Enums\ListingStatus;
use App\Enums\WorkType;
use App\Filament\Company\Resources\JobListingResource\Pages;
use App\Filament\Company\Resources\JobListingResource\RelationManagers;
use App\Models\JobListing;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class JobListingResource extends Resource
{
    protected static ?string $model = JobListing::class;

    protected static ?string $navigationIcon = 'heroicon-o-briefcase';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Grid::make(['sm' => 2, 'xl' => 4])
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->columnSpan(['sm' => 2])
                            ->required()
                            ->maxLength(80),
                        Forms\Components\DatePicker::make('closing_date'),
                        Forms\Components\Select::make('status')
                            ->options(ListingStatus::class),
                        Forms\Components\RichEditor::make('description')
                            ->required()
                            ->maxLength(5000)
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'bulletList',
                                'italic',
                                'orderedList',
                                'redo',
                                'strike',
                                'underline',
                                'undo',
                            ]),
                        Forms\Components\Select::make('work_type')
                            ->options(WorkType::class),
                        Forms\Components\TextInput::make('salary')
                            ->numeric()
                            ->prefix('€'),
                        Forms\Components\TextInput::make('min_salary')
                            ->numeric()
                            ->prefix('€'),
                        Forms\Components\TextInput::make('max_salary')
                            ->numeric()
                            ->prefix('€'),
                        Forms\Components\SpatieTagsInput::make('skills')
                            ->columnSpan(['xl' => 2])
                            ->label('Skills')
                            ->type('skill'),
                        Forms\Components\SpatieTagsInput::make('keywords')
                            ->columnSpan(['xl' => 2])
                            ->label('Keywords')
                            ->type('keyword'),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->limit(30)
                    ->searchable(),
                Tables\Columns\BadgeColumn::make('work_type')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('salary')
                    ->numeric(decimalPlaces: 0)
                    ->prefix('€')
                    ->sortable(),
                Tables\Columns\TextColumn::make('closing_date')
                    ->label('closes')
                    ->date()
                    ->size('xs')
                    ->sortable(),
                Tables\Columns\BadgeColumn::make('status')
                    ->alignCenter(),
                Tables\Columns\TextColumn::make('published_at')
                    ->label('published')
                    ->dateTime()
                    ->since()
                    ->size('xs')
                    ->sortable(),
                Tables\Columns\TextColumn::make('expired_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobListings::route('/'),
            'create' => Pages\CreateJobListing::route('/create'),
            'edit' => Pages\EditJobListing::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('company_id', auth()->user()->company->id)
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
