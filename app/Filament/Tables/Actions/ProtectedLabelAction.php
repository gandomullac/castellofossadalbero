<?php

namespace App\Filament\Tables\Actions;

use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;

class ProtectedLabelAction extends Action
{
    use CanCustomizeProcess;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(__('castello.protected'));

        $this->color('grey');

        $this->icon('heroicon-o-lock-closed');

        $this->hidden(fn(Model $record): bool => ! $record->protected);

        $this->disabled();
    }

    public static function getDefaultName(): ?string
    {
        return 'protected';
    }
}
