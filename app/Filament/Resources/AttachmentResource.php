<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttachmentResource\Pages;
use App\Filament\Tables\Actions\ProtectAction;
use App\Models\Attachment;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Webbingbrasil\FilamentCopyActions\Tables\CopyableTextColumn;

class AttachmentResource extends Resource
{
    protected static ?string $model = Attachment::class;

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';

    public static function getLabel(): ?string
    {
        return __('castello.attachment');
    }

    public static function getPluralLabel(): ?string
    {
        return __('castello.attachments');
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
                    Section::make(__('castello.attachment'))->schema([
                        FileUpload::make('path')
                            ->label('File')
                            ->disk('public')
                            ->directory('uploads/attachments')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                    ->prepend(now()->timestamp . '_'),
                            )
                            ->storeFileNamesIn('name')
                            ->columnSpan(1)
                            ->required(),
                        Checkbox::make('protected')
                            ->label(__('castello.protected'))
                            ->hidden(
                                fn (): bool => ! Auth::user()->isAdmin(),
                            ),
                    ])->columns(2),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label(__('castello.name'))
                    ->url(fn ($record) => url($record->fileUrl))
                    ->openUrlInNewTab()
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                // TextColumn::make('fileUrl')
                //     ->label('File URL')
                //     ->wrap()
                //     ->sortable(),
                CopyableTextColumn::make('fileUrl')
                    ->label(__('castello.copy_file_url'))
                    ->copyMessage('URL copied to clipboard')
                    ->onlyIcon()
                    ->toggleable(),
                TextColumn::make('fileSize')
                    ->label(__('castello.file_size'))
                    ->suffix(' MB')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label(__('castello.created_at'))
                    ->dateTime()
                    ->sortable(),

            ])
            ->filters([

            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record): void {
                        $record->deleteFile();
                    }),
                ProtectAction::make(),
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
            'index' => Pages\ListAttachments::route('/'),
            'create' => Pages\CreateAttachment::route('/create'),
            'edit' => Pages\EditAttachment::route('/{record}/edit'),
        ];
    }
}
