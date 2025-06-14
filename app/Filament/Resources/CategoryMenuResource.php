<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryMenuResource\Pages;
use App\Models\CategoryMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CategoryMenuResource extends Resource
{
    protected static ?string $model = CategoryMenu::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    protected static ?string $navigationGroup = 'Manajemen Menu';
    protected static ?string $label = 'Category Menu';
    protected static ?string $pluralLabel = 'Category Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_kategori')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Kategori'),

                Forms\Components\TextInput::make('nama_menu')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Menu'),

                Forms\Components\TextInput::make('kalori')
                    ->required()
                    ->numeric()
                    ->label('Kalori'),

                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull()
                    ->label('Deskripsi'),                

                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->image()
                    ->directory('category-menu-images')
                    ->label('Gambar Category Menu'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),

                Tables\Columns\TextColumn::make('nama_kategori')
                    ->label('Nama Kategori')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nama_menu')
                    ->label('Nama Menu')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('kalori')
                    ->label('Kalori')
                    ->sortable(),

                Tables\Columns\TextColumn::make('deskripsi')
                    ->html()
                    ->limit(50)
                    ->label('Deskripsi'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Dibuat Pada'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->label('Diperbarui Pada'),
            ])
            ->filters([
                // Anda dapat menambahkan filter jika diperlukan
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
            // Menambahkan relasi jika ada, misalnya relasi dengan Menu
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategoryMenus::route('/'),
            'create' => Pages\CreateCategoryMenu::route('/create'),
            'edit' => Pages\EditCategoryMenu::route('/{record}/edit'),
        ];
    }
}
