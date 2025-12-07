<?php

namespace App\Traits;

trait ManagerTrait
{
    public function hasBalance(): bool
    {
        return $this->balance > 0;
    }
}
