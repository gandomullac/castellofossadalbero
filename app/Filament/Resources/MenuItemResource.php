<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuItemResource\Pages;
use App\Models\MenuItem;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class MenuItemResource extends Resource
{
    protected static ?string $model = MenuItem::class;

    protected static ?string $navigationGroup = 'Menu';

    protected static ?string $navigationIcon = 'heroicon-o-sparkles';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()->schema([
                    Section::make('Contents')->schema([
                        TextInput::make('title')
                            ->minLength(5)
                            ->maxLength(255)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('subtitle')
                            ->minLength(5)
                            ->maxLength(255)
                            ->required()
                            ->columnSpanFull(),

                        TextInput::make('price')
                            ->prefix('€')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->required()
                            ->columnSpan(2),

                        TagsInput::make('tags')
                            ->required()
                            ->columnSpan(3),

                    ])->columns(5),

                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('Image')->schema([
                        FileUpload::make('image')
                            ->label('')
                            ->avatar()
                            ->disk('public')
                            ->directory('uploads/menu')
                            ->nullable(),
                    ]),

                    Section::make('Menu')->schema([
                        Select::make('menu_category_id')
                            ->relationship('menuCategories', 'name')
                            ->searchable()
                            ->multiple()
                            ->preload(),
                    ]),
                ])->columnSpan(1),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->toggleable(),
                TextColumn::make('title')
                    ->sortable(),
                TextColumn::make('price')
                    ->prefix('€ ')
                    ->sortable(),
                TextColumn::make('menuCategories.name'),
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
            'index' => Pages\ListMenuItems::route('/'),
            'create' => Pages\CreateMenuItem::route('/create'),
            'edit' => Pages\EditMenuItem::route('/{record}/edit'),
        ];
    }
}
