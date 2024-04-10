<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    protected static ?int $navigationSort = 9;

    public static function getLabel(): ?string
    {
        return __('castello.user');
    }

    public static function getPluralModelLabel(): string
    {
        return __('castello.users');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('castello.company');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('castello.user-name'))
                    ->required(),
                TextInput::make('email')
                    ->label(__('castello.user-email'))
                    ->required(),
                TextInput::make('password')
                    ->label(__('castello.user-password'))
                    ->password()
                    ->revealable()
                    // ->readOnlyOn('edit')
                    // ->hiddenOn('edit')
                    ->required(),
                Select::make('role')
                    ->label(__('castello.user-role'))
                    ->options([
                        'admin' => __('castello.user-role-admin'),
                        'editor' => __('castello.user-role-editor'),
                    ])
                    // ->default('editor')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('castello.user-name')),
                TextColumn::make('email')
                    ->label(__('castello.user-email')),
                TextColumn::make('role')
                    ->label(__('castello.user-role')),
                TextColumn::make('created_at')
                    ->label(__('castello.user-created-at')),
            ])
            ->filters([

            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
