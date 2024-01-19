<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuCategoryResource\Pages;
use App\Models\MenuCategory;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuCategoryResource extends Resource
{
    protected static ?string $model = MenuCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Group::make()->schema([
                Section::make('Contents')->schema([
                    TextInput::make('name')
                        ->minLength(5)
                        ->maxLength(255)
                        ->required()
                        ->columnSpan(3),

                    TextInput::make('order')
                        ->numeric()
                        ->minValue(0)
                        ->maxValue(10)
                        ->default(MenuCategory::highestAvailableOrder())
                        ->afterStateHydrated(function (string $operation, string $state, Set $set, Get $get) {
                            if ($operation === 'edit') {
                                return;
                            }

                            // ad ogni submit aggiorno il valore di order.
                            $set('order', MenuCategory::highestAvailableOrder());

                        })
                        ->required()
                        ->columnSpan(1),
                ])->columns(4),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable(),
                TextColumn::make('order')->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMenuCategories::route('/'),
            'create' => Pages\CreateMenuCategory::route('/create'),
            'edit' => Pages\EditMenuCategory::route('/{record}/edit'),
        ];
    }
}
