<?php

namespace App\Enums;

enum ClientTypeAccountEnum: string
{
    case Personal = 'personal';
    case Company = 'company';
    case Cafe = 'cafe';
    case Reseller = 'reseller';
    case Branch = 'branch';

    public static function all(): array
    {
        return array_column(self::cases(), 'value');
    }

    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn ($case) => [$case->value => $case->label()])->toArray();
    }

    public function label(): string
    {
        return __($this->value);
    }

    public function color(): string
    {
        return match ($this) {
            self::Personal => 'bg-green-500',
            self::Company => 'bg-blue-500',
        };
    }
}
