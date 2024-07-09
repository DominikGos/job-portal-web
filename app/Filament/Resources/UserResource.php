<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers\EducationRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\ExperienceRelationManager;
use App\Filament\Resources\UserResource\RelationManagers\LinksRelationManager;
use App\Models\User\User;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\Support\Htmlable;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('email')->required(),
                TextInput::make('password')->required()->visibleOn('create'),
                TextInput::make('phone'),
                TextInput::make('description'),
                FileUpload::make('avatar')->avatar(),
                Select::make('skills')
                    ->multiple()
                    ->relationship('skills', 'content')
                    ->preload(),
                Select::make('applications')
                    ->preload()
                    ->relationship('applications', 'title')
                    ->multiple()
                    ->label('User applications'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email'),
                TextColumn::make('phone'),
                ImageColumn::make('avatar'),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->sortable(),
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
            ExperienceRelationManager::class,
            EducationRelationManager::class,
            LinksRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationIcon(): string|Htmlable|null
    {
        return 'heroicon-o-users';
    }
}
