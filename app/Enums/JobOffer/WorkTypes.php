<?php 

namespace App\Enums\JobOffer;

use Filament\Support\Contracts\HasLabel;

enum WorkTypes: string implements HasLabel {
    case REMOTE = 'remote';
    case STATIONARY = 'stationary';
    case HYBRID = 'hybrid';

    public function getLabel(): ?string
    {
        return match($this) {
            self::REMOTE => 'Remote job',
            self::STATIONARY => 'Stationary job',
            self::HYBRID => 'Hybrid job',
        };
    }

    public static function keyLabels(): array
    {
        return array_reduce(self::cases(), function($keyLabels, WorkTypes $enum) {
            $keyLabels[$enum->value] = $enum->getLabel();
            
            return $keyLabels;
        });
    }
}