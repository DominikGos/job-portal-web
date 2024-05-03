<?php

namespace App\Enums\JobOffer;

use Filament\Support\Contracts\HasLabel;

enum JobLevels: string implements HasLabel
{
    case JUNIOR = 'junior';
    case MID = 'mid';
    case SENIOR = 'senior';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::JUNIOR => 'Junior developer',
            self::MID => 'Mid developer',
            self::SENIOR => 'Senior developer',
        };    
    }

    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function($keyLabels, JobLevels $enum) {
            $keyLabels[$enum->value] = $enum->getLabel();
            
            return $keyLabels;
        });
    }
}
