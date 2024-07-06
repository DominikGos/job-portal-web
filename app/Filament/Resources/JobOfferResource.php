<?php

namespace App\Filament\Resources;

use App\Enums\JobOffer\JobLevels;
use App\Enums\JobOffer\WorkSchedules;
use App\Enums\JobOffer\WorkTypes;
use App\Filament\Resources\JobOfferResource\Pages;
use App\Filament\Resources\JobOfferResource\RelationManagers\BenefitsRelationManager;
use App\Filament\Resources\JobOfferResource\RelationManagers\RequirementsRelationManager;
use App\Filament\Resources\JobOfferResource\RelationManagers\ResponsibilitiesRelationManager;
use App\Filament\Resources\JobOfferResource\RelationManagers\SalariesRelationManager;
use App\Models\JobOffer\JobOffer;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class JobOfferResource extends Resource
{
    protected static ?string $model = JobOffer::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('title')->required(),
                DatePicker::make('valid_until')->required(),
                Select::make('required_level')
                    ->options(JobLevels::class),
                Select::make('work_type')
                    ->options(WorkTypes::class),
                Select::make('work_schedule')
                    ->options(WorkSchedules::class),
                Select::make('user_id')
                    ->relationship('user', 'name')
                    ->searchable(['name', 'email'])
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('title'),
                TextColumn::make('required_level'),
                TextColumn::make('work_type'),
                TextColumn::make('work_schedule'),
                TextColumn::make('valid_until')->dateTime(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RequirementsRelationManager::class,
            ResponsibilitiesRelationManager::class,
            BenefitsRelationManager::class,
            SalariesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListJobOffers::route('/'),
            'create' => Pages\CreateJobOffer::route('/create'),
            'edit' => Pages\EditJobOffer::route('/{record}/edit'),
        ];
    }
}
