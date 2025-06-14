<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Filament\Resources\MenuResource\RelationManagers;
use App\Models\Menu;
use App\Models\CategoryMenu;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    protected static ?string $navigationGroup = 'Manajemen Menu';
    protected static ?string $label = 'Menu';
    protected static ?string $pluralLabel = 'Menu';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_menu_id')
                    ->relationship('categoryMenu', 'nama_kategori')
                    ->required()
                    ->searchable()
                    ->preload()
                    ->createOptionForm([
                        Forms\Components\TextInput::make('nama_kategori')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Kategori'),
                        Forms\Components\TextInput::make('nama_menu')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Menu Kategori'),
                        Forms\Components\TextInput::make('kalori')
                            ->required()
                            ->numeric()
                            ->label('Kalori'),
                        Forms\Components\Textarea::make('deskripsi')
                            ->required()
                            ->label('Deskripsi'),
                    ])
                    ->label('Kategori Menu'),

                Forms\Components\TextInput::make('nama_menu')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Menu'),

                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->image()
                    ->directory('menu-images')
                    ->label('Gambar Menu'),
                
                Forms\Components\TextInput::make('kalori')
                    ->required()
                    ->numeric()
                    ->label('Kalori'),
                    
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull()
                    ->label('Deskripsi'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),
                    
                Tables\Columns\TextColumn::make('categoryMenu.nama_kategori')
                    ->searchable()
                    ->sortable()
                    ->label('Kategori'),
                    
                Tables\Columns\TextColumn::make('nama_menu')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Menu'),
                
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
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Dibuat Pada'),
                    
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->label('Diperbarui Pada'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_menu_id')
                    ->relationship('categoryMenu', 'nama_kategori')
                    ->searchable()
                    ->preload()
                    ->label('Kategori'),
                    
                Tables\Filters\Filter::make('created_at')
                    ->form([
                        Forms\Components\DatePicker::make('created_from')
                            ->label('Dibuat Dari'),
                        Forms\Components\DatePicker::make('created_until')
                            ->label('Dibuat Sampai'),
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
                            $indicators['created_from'] = 'Dibuat dari ' . $data['created_from'];
                        }
                        
                        if ($data['created_until'] ?? null) {
                            $indicators['created_until'] = 'Dibuat sampai ' . $data['created_until'];
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }
}