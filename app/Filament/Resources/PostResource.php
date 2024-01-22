<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Models\Post;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $modelLabel = 'News';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()->schema([
                    Section::make('Contents')->schema([
                        TextInput::make('title')
                            ->minLength(5)
                            ->maxLength(255)
                            ->required(),

                        TextInput::make('subtitle')
                            ->minLength(5)
                            ->maxLength(255)
                            ->required(),

                        RichEditor::make('content')
                            ->required(),
                    ]),

                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make('image')->schema([
                        FileUpload::make('image')
                            ->label('')
                            // ->avatar()
                            ->disk('public')
                            ->directory('uploads/posts')
                            ->required(),
                    ]),

                    Section::make('Publish policy')->schema([
                        DatePicker::make('published_at'),
                        DatePicker::make('unpublished_at'),
                        Select::make('order')
                            ->label('Priority')
                            ->options([
                                '1' => 'High',
                                '2' => 'Medium',
                                '3' => 'Low',
                            ])->default(2),
                        Checkbox::make('archived'),
                    ]),
                ]),

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
                TextColumn::make('subtitle'),
                TextColumn::make('publishStatus')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'expired' => 'gray',
                        'draft' => 'warning',
                        'published' => 'success',
                        'archived' => 'danger',
                    })
                    ->sortable(),
                TextColumn::make('created_at')->date(),

                CheckboxColumn::make('archived')
                    ->label('Archive')
                    ->afterStateUpdated(function (string $state, Set $set) {
                        if ($state == 'true') {
                            $set('publishStatus', 'archived');
                        }
                    }),

            ])
            ->filters([
                //
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
