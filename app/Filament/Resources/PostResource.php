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
use Filament\Resources\Resource;
use Filament\Tables;
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
                    Section::make('Image')->schema([
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
                        Select::make('priority')
                            ->options([
                                '1' => 'High',
                                '2' => 'Medium',
                                '3' => 'Low',
                            ])->default(2),
                        // Checkbox::make('archive'),
                    ]),
                ]),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
