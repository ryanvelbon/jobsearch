<?php

namespace App\Enums;
use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasLabel;

enum AccountType: string implements HasLabel, HasColor
{
    case Candidate = 'candidate';
    case Company = 'company';

    public function getLabel(): ?string
    {
        return $this->name;
    }

    public function getColor(): string | array | null
    {
        return match($this) {
            self::Candidate => 'info',
            self::Company => 'gray',
        };
    }
}
