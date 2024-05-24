<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum WorkType: string implements HasLabel, HasColor
{
    case FullTime = 'full time';
    case PartTime = 'part time';
    case Contract = 'contract';
    case Casual   = 'casual';

    public function getLabel(): ?string
    {
        return match($this) {
            self::FullTime => 'Full time',
            self::PartTime => 'Part time',
            self::Contract => 'Contract/Temp',
            self::Casual   => 'Casual/Vacation',
        };
    }

    public function getColor(): string | array | null
    {
        return match($this) {
            self::FullTime => 'gray',
            self::PartTime => 'gray',
            self::Contract => 'gray',
            self::Casual   => 'gray',
        };
    }
}
