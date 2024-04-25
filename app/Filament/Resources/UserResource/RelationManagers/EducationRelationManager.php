<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use App\Models\User\Education;
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

class EducationRelationManager extends RelationManager
{
    protected static string $relationship = 'education';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('school_name')
                    ->required()
                    ->maxLength(255),
                Textarea::make('description'),
                DatePicker::make('sarted_at')->required(),
                DatePicker::make('end_at'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('school_name')
            ->columns([
                TextColumn::make('school_name')
                    ->description(fn(Education $education): ?string => $education->description),
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
