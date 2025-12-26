<?php

namespace App\Enums;

enum ClientStausEnum: string
{
    case Active = 'active';
    case Inactive = 'inactive';
    case Suspended = 'suspended';
    case Cancelled = 'cancelled';
    case Expired = 'expired';

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
            self::Active => 'success',
            self::Inactive, self::Cancelled => 'danger',
            self::Expired => 'warning',
            self::Suspended => 'gray',
        };
    }
}
