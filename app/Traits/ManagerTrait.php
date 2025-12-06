<?php

namespace App\Traits;

trait ManagerTrait
{
    public function getManagerName(): string
    {
        return $this->name;
    }

    public function hasBalance(): bool
    {
        return $this->balance > 0;
    }
}
