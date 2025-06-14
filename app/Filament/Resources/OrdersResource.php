<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrdersResource\Pages;
use App\Models\Order;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class OrdersResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->relationship('user', 'name')
                    ->label('User')
                    ->searchable()
                    ->required(),

                Forms\Components\TextInput::make('nama_program')
                    ->label('Nama Program')
                    ->required(),

                Forms\Components\TextInput::make('jumlah')
                    ->numeric()
                    ->required(),

                Forms\Components\Textarea::make('catatan')
                    ->nullable(),

                Forms\Components\TextInput::make('harga_normal')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('total_harga')
                    ->numeric()
                    ->required(),

                Forms\Components\TextInput::make('alamat')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'cancelled' => 'Cancelled',
                    ])
                    ->default('pending')
                    ->required(),

                Forms\Components\Select::make('delivery_status')
                    ->options([
                        'sedang diproses' => 'Sedang Diproses',
                        'terkirim' => 'Terkirim',
                    ])
                    ->nullable(),

                Forms\Components\TextInput::make('midtrans_order_id')
                    ->label('Midtrans Order ID')
                    ->nullable()
                    ->unique(ignoreRecord: true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('nama_program')->label('Program'),
                Tables\Columns\TextColumn::make('jumlah'),
                Tables\Columns\TextColumn::make('harga_normal')->money('IDR', true),
                Tables\Columns\TextColumn::make('total_harga')->money('IDR', true),
                Tables\Columns\TextColumn::make('status')->badge(),
                Tables\Columns\TextColumn::make('delivery_status')->badge(),
                Tables\Columns\TextColumn::make('created_at')->dateTime('d M Y')->label('Dipesan Pada'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'paid' => 'Paid',
                        'cancelled' => 'Cancelled',
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrders::route('/create'),
            'edit' => Pages\EditOrders::route('/{record}/edit'),
        ];
    }
}
