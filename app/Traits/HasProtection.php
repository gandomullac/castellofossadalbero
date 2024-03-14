<?php

namespace App\Traits;

trait HasProtection
{
    public function toggleProtected(): bool
    {
        return $this->update(['protected' => ! $this->protected]);
    }
}
