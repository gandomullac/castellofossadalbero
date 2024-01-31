<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuCategoryResource\Pages;
use App\Filament\Resources\MenuCategoryResource\RelationManagers\MenuItemsRelationManager;
use App\Models\MenuCategory;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ColorColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuCategoryResource extends Resource
{
    protected static ?string $model = MenuCategory::class;

    public static function getLabel(): ?string
    {
        return __('castello.menu_category');
    }

    public static function getPluralModelLabel(): string
    {
        return __('castello.menu_categories');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('castello.menu');
    }

    protected static ?int $navigationSort = 4;

    protected static ?string $navigationIcon = 'heroicon-o-bars-3';

    public static function form(Form $form): Form
    {
        return $form->schema([
            Group::make()->schema([
                Section::make(__('castello.contents'))->schema([
                    TextInput::make('name')
                        ->label(__('castello.name'))
                        ->minLength(5)
                        ->maxLength(255)
                        ->unique()
                        ->required()
                        ->columnSpan(3),

                    TextInput::make('order')
                        ->label(__('castello.order'))
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

                    ColorPicker::make('color')
                        ->label(__('castello.color'))
                        ->nullable()
                        ->columnSpan(1),

                ])->columns(5),
            ])->columnSpanFull(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order')->sortable()
                    ->label(__('castello.order')),
                TextColumn::make('name')->sortable()
                    ->label(__('castello.name')),
                ColorColumn::make('color')
                    ->label(__('castello.color')),
                TextColumn::make('countMenuItems')
                    ->label(__('castello.count_menu_items'))
                    ->sortable(),
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
            MenuItemsRelationManager::class,
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
