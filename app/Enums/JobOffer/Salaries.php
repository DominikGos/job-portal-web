<?php

namespace App\Enums\JobOffer;

use Filament\Support\Contracts\HasLabel;

enum Salaries: string implements HasLabel
{
    case PLN = 'pln';
    case USD = 'usd';
    case EUR = 'eur';

    public function getLabel(): ?string
    {
        return match($this) {
            self::PLN => 'Złoty',
            self::USD => 'Dollars',
            self::EUR => 'Euros',
        };
    }

    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function($keyLabels, Salaries $enum) {
            $keyLabels[$enum->value] = $enum->getLabel();
            
            return $keyLabels;
        });
    }
}
