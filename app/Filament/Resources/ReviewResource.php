<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ReviewResource\Pages;
use App\Models\Review;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ReviewResource extends Resource
{
    protected static ?string $model = Review::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationIcon = 'heroicon-o-face-smile';

    public static function getLabel(): ?string
    {
        return __('castello.review');
    }

    public static function getPluralModelLabel(): string
    {
        return __('castello.reviews');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('castello.website');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make(__('castello.contents'))->schema([

                    TextInput::make('author')
                        ->label(__('castello.author'))
                        ->minLength(3)
                        ->maxLength(255)
                        ->required()
                        ->columnSpan(2),

                    Select::make('platform')
                        ->label(__('castello.platform'))
                        ->options([
                            'Facebook Reviews' => 'Facebook Reviews',
                            'Google Reviews' => 'Google Reviews',
                        ])
                        ->required()
                        ->columnSpan(1),

                    TextInput::make('url')
                        ->label(__('castello.url'))
                        ->url()
                        ->required()
                        ->columnSpan(2),

                    TextInput::make('content')
                        ->label(__('castello.content'))
                        ->required()
                        ->columnSpanFull(),

                ])->columns(5),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('author')
                    ->label(__('castello.author')),
                TextColumn::make('excerpt')
                    ->label(__('castello.excerpt')),
                TextColumn::make('platform')
                    ->label(__('castello.platform')),
                // TextColumn::make('url')
                //     ->label(__('castello.url'))
                //     ->url(fn($record) => url($record->url)),
                IconColumn::make('url')
                    ->label(__('castello.url'))
                    ->icon('heroicon-o-link')
                    ->url(fn($record) => url($record->url))
                    ->openUrlInNewTab(),
            ])
            ->filters([

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

        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListReviews::route('/'),
            'create' => Pages\CreateReview::route('/create'),
            'edit' => Pages\EditReview::route('/{record}/edit'),
        ];
    }
}
