<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Tables\Actions\ProtectAction;
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
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    public static function getLabel(): ?string
    {
        return __('castello.news');
    }

    public static function getNavigationGroup(): ?string
    {
        return __('castello.website');
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Group::make()->schema([
                    Section::make(__('castello.contents'))->schema([
                        TextInput::make('title')
                            ->label(__('castello.title'))
                            ->minLength(5)
                            ->maxLength(255)
                            ->required(),

                        TextInput::make('subtitle')
                            ->label(__('castello.subtitle'))
                            ->maxLength(100),

                        RichEditor::make('content')
                            ->label(__('castello.content'))
                            ->required(),
                    ]),

                ])->columnSpan(2),

                Group::make()->schema([
                    Section::make(__('castello.image'))
                        ->schema([
                            FileUpload::make('image_path')
                                ->label('')
                                // ->avatar()
                                ->disk('public')
                                ->directory('uploads/posts')
                                ->required(),
                        ]),

                    Section::make(__('castello.publish_policy'))->schema([
                        DatePicker::make('published_at')
                            ->label(__('castello.published_at')),
                        DatePicker::make('unpublished_at')
                            ->label(__('castello.unpublished_at')),
                        Select::make('priority')
                            ->label(__('castello.priority'))
                            ->options([
                                1 => __('castello.priority_high'),
                                0 => __('castello.priority_medium'),
                                -1 => __('castello.priority_low'),
                            ])->default(0),
                        Checkbox::make('archived')
                            ->label(__('castello.archived')),
                        Checkbox::make('protected')
                            ->label(__('castello.protected'))
                            ->hidden(
                                fn (): bool => ! Auth::user()->isAdmin(),
                            ),

                    ]),
                ]),

            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->toggleable()
                    ->square()
                    ->label(__('castello.image_path')),
                TextColumn::make('title')
                    ->label(__('castello.title'))
                    ->description(fn (Post $record): string => $record->excerpt)
                    ->wrap()
                    ->sortable(),
                TextColumn::make('subtitle')
                    ->label(__('castello.subtitle'))
                    ->wrap(),
                TextColumn::make('publishStatus')
                    ->label(__('castello.publish_status'))
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        __('castello.expired') => 'gray',
                        __('castello.scheduled') => 'warning',
                        __('castello.published') => 'success',
                        __('castello.archived') => 'danger',
                    }),
                // ->sortable(),
                // TextColumn::make('created_at')->date(),
                IconColumn::make('priority')
                    ->label(__('castello.priority'))
                    ->sortable()
                    ->icon(fn (string $state): string => match ($state) {
                        '1' => 'heroicon-o-arrow-up-circle',
                        '0' => 'heroicon-o-minus-circle',
                        '-1' => 'heroicon-o-arrow-down-circle',
                    })
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'danger',
                        '0' => 'info',
                        '-1' => 'warning',
                    }),

                /*
                CheckboxColumn::make('archived')
                    ->label(__('castello.force_archive'))
                    ->disabled(
                        fn(Post $record): bool => $record->protected && ! Auth::user()->isAdmin()
                    )
                    ->afterStateUpdated(function (string $state, Set $set): void {
                        if ('true' === $state) {
                            $set('publishStatus', 'archived');
                        }
                    }),
                */

            ])->defaultSort('Priority', 'desc')
            ->filters([
                SelectFilter::make('publishStatus')
                    ->label(__('castello.publish_status'))
                    ->options([
                        'expired' => __('castello.expired'),
                        'scheduled' => __('castello.scheduled'),
                        'published' => __('castello.published'),
                        'archived' => __('castello.archived'),
                    ]),
                Filter::make('archived'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                ProtectAction::make(),

                // Tables\Actions\Action::make('Protected')
                //     ->label(__('castello.protected'))
                //     ->disabled()
                //     ->color('grey')
                //     ->icon('heroicon-o-lock-closed')
                //     ->hidden(fn(Post $record): bool => ! $record->protected),

            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
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
