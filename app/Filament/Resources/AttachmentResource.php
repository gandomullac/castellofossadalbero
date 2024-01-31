<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AttachmentResource\Pages;
use App\Models\Attachment;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;
use Webbingbrasil\FilamentCopyActions\Tables\CopyableTextColumn;

class AttachmentResource extends Resource
{
    protected static ?string $model = Attachment::class;
    
    public static function getNavigationGroup(): ?string
    {
        return __('castello.website');
    }

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationIcon = 'heroicon-o-paper-clip';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Attachment')->schema([
                        FileUpload::make('path')
                            ->label('File')
                            ->disk('public')
                            ->directory('uploads/attachments')
                            ->getUploadedFileNameForStorageUsing(
                                fn (TemporaryUploadedFile $file): string => (string) str($file->getClientOriginalName())
                                    ->prepend(now()->timestamp.'_'),
                            )
                            ->storeFileNamesIn('name')
                            ->columnSpan(1)
                            ->required(),
                    ])->columns(2),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Name')
                    ->url(fn ($record) => url($record->fileUrl))
                    ->searchable()
                    ->wrap()
                    ->sortable(),
                TextColumn::make('fileUrl')
                    ->label('File URL')
                    ->wrap()
                    ->sortable(),
                CopyableTextColumn::make('fileUrl')
                    ->label('Copy File URL')
                    ->copyMessage('URL copied to clipboard')
                    ->onlyIcon()
                    ->toggleable(),
                TextColumn::make('fileSize')
                    ->suffix(' MB')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Created At')
                    ->dateTime()
                    ->sortable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                // Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()
                    ->before(function ($record) {
                        $record->deleteFile();
                    }),
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
            'index' => Pages\ListAttachments::route('/'),
            'create' => Pages\CreateAttachment::route('/create'),
            'edit' => Pages\EditAttachment::route('/{record}/edit'),
        ];
    }
}
