<?php

namespace App\Enums;

enum CardsStatusEnum: string
{
    case NewCard = 'new';
    case Sold = 'sold';
    case Used = 'used';
    case Expired = 'expired';
    case Cancelled = 'cancelled';
}
