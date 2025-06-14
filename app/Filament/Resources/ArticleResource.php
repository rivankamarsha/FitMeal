<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArticleResource\Pages;
use App\Filament\Resources\ArticleResource\RelationManagers;
use App\Models\Article;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArticleResource extends Resource
{
    protected static ?string $model = Article::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Konten';
    protected static ?string $label = 'Artikel';
    protected static ?string $pluralLabel = 'Artikel';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul Artikel'),

                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->image()
                    ->directory('artikel-images')
                    ->label('Gambar Artikel'),
                    
                Forms\Components\TextInput::make('sumber')
                    ->maxLength(255)
                    ->label('Sumber')
                    ->helperText('Sumber artikel (opsional)'),
                    
                Forms\Components\TextInput::make('link_sumber')
                    ->url()
                    ->maxLength(255)
                    ->label('Link Sumber')
                    ->helperText('Link ke sumber artikel (opsional)'),
                    
                Forms\Components\RichEditor::make('deskripsi')
                    ->required()
                    ->columnSpanFull()
                    ->fileAttachmentsDisk('public')
                    ->fileAttachmentsDirectory('artikel-attachments')
                    ->label('Konten Artikel'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),
                    
                Tables\Columns\TextColumn::make('judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->label('Judul'),
                    
                Tables\Columns\TextColumn::make('sumber')
                    ->searchable()
                    ->sortable()
                    ->label('Sumber'),
                    
                Tables\Columns\TextColumn::make('deskripsi')
                    ->html()
                    ->limit(50)
                    ->label('Konten')
                    ->toggleable(),
                    
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: false)
                    ->label('Tanggal Publikasi'),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Terakhir Diperbarui'),
            ])
            ->filters([
                Tables\Filters\Filter::make('has_source')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('sumber'))
                    ->label('Memiliki Sumber'),
                    
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dari Tanggal'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Sampai Tanggal'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                    ->indicateUsing(function (array $data): array {
                        $indicators = [];
                        
                        if ($data['created_from'] ?? null) {
                            $indicators['created_from'] = 'Dari ' . $data['created_from'];
                        }
                        
                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Sampai ' . $data['created_until'];
                        }
                        
                        return $indicators;
                    }),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListArticles::route('/'),
            'create' => Pages\CreateArticle::route('/create'),
            'edit' => Pages\EditArticle::route('/{record}/edit'),
        ];
    }
}