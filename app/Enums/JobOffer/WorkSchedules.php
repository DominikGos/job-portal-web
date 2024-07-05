<?php

namespace App\Enums\JobOffer;

use Filament\Support\Contracts\HasLabel;

enum WorkSchedules: string implements HasLabel
{
    case PartTime = 'part time';
    case FullTime = 'full time';

    public function getLabel(): ?string
    {
        return match($this) {
            self::PartTime => 'part time',
            self::FullTime => 'full time',
        };
    }

    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function($keyLabels, WorkSchedules $enum) {
            $keyLabels[$enum->value] = $enum->getLabel();
            
            return $keyLabels;
        });
    }
}
