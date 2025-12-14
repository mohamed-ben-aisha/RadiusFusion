<?php

namespace App\Enums;

enum CardBatchStatusEnum: string
{
    case Draft = 'draft';
    case Generated = 'generated';
    case Sold = 'sold';
    case Closed = 'closed';
}
