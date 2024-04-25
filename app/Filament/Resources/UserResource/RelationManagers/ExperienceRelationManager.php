<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\User\Experience;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ExperienceRelationManager extends RelationManager
{
    protected static string $relationship = 'experience';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('company_name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description'),
                DatePicker::make('started_at')->required(),
                DatePicker::make('end_at'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('company_name')
            ->columns([
                TextColumn::make('company_name')
                  ->description(fn(Experience $experience): string => $experience->description),
                TextColumn::make('started_at')->dateTime(),
                TextColumn::make('end_at')->dateTime(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
