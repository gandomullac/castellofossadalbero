<?php

namespace App\Filament\Tables\Actions;

use Filament\Actions\Concerns\CanCustomizeProcess;
use Filament\Tables\Actions\Action;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ProtectAction extends Action
{
    use CanCustomizeProcess;

    protected function setUp(): void
    {
        parent::setUp();

        $this->label(fn (Model $record): string => $record->protected ? __('castello.protected') : __('castello.protect'));

        $this->color(fn (Model $record): string => $record->protected ? 'grey' : 'info');

        $this->icon(fn (Model $record): string => $record->protected ? 'heroicon-o-lock-closed' : 'heroicon-o-lock-open');

        $this->hidden(fn (Model $record): bool => ! $record->protected && ! Auth::user()->isAdmin());

        $this->disabled(fn (): bool => ! Auth::user()->isAdmin());

        $this->action(function (): void {
            $result = $this->process(static fn (Model $record) => $record->toggleProtected());

            if (! $result) {
                $this->failure();

                return;
            }

            $this->success();
        });
    }

    public static function getDefaultName(): ?string
    {
        return 'protected';
    }
}
