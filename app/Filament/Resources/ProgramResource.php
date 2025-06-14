<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramResource\Pages;
use App\Filament\Resources\ProgramResource\RelationManagers;
use App\Models\Program;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Program';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_program')
                    ->required()
                    ->maxLength(255)
                    ->label('Nama Program'),

                Forms\Components\FileUpload::make('image')
                    ->required()
                    ->image()
                    ->directory('program-images')
                    ->label('Gambar Program'),
                    
                Forms\Components\Textarea::make('deskripsi')
                    ->required()
                    ->columnSpanFull()
                    ->label('Deskripsi'),                
                    
                Forms\Components\TextInput::make('harga_normal')
                    ->required()
                    ->numeric()
                    ->prefix('Rp')
                    ->label('Harga Normal'),
                    
                Forms\Components\TextInput::make('harga_diskon')
                    ->numeric()
                    ->prefix('Rp')
                    ->label('Harga Diskon')
                    ->helperText('Biarkan kosong jika tidak ada diskon'),
                    
                Forms\Components\Toggle::make('is_popular')
                    ->label('Program Populer')
                    ->default(false),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->square(),
                    
                Tables\Columns\TextColumn::make('nama_program')
                    ->searchable()
                    ->sortable()
                    ->label('Nama Program'),
                    
                Tables\Columns\TextColumn::make('deskripsi')
                    ->html()
                    ->limit(50)
                    ->label('Deskripsi'),
                    
                Tables\Columns\TextColumn::make('harga_normal')
                    ->money('IDR')
                    ->sortable()
                    ->label('Harga Normal'),
                    
                Tables\Columns\TextColumn::make('harga_diskon')
                    ->money('IDR')
                    ->sortable()
                    ->label('Harga Diskon')
                    ->default('-'),
                    
                Tables\Columns\IconColumn::make('is_popular')
                    ->boolean()
                    ->sortable()
                    ->label('Program Populer'),
                    
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
                Tables\Filters\Filter::make('is_popular')
                    ->query(fn (Builder $query): Builder => $query->where('is_popular', true))
                    ->label('Program Populer'),
                    
                Tables\Filters\Filter::make('discounted')
                    ->query(fn (Builder $query): Builder => $query->whereNotNull('harga_diskon'))
                    ->label('Program Diskon'),
                    
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
            'index' => Pages\ListPrograms::route('/'),
            'create' => Pages\CreateProgram::route('/create'),
            'edit' => Pages\EditProgram::route('/{record}/edit'),
        ];
    }
}