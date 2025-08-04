<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PotensiResource\Pages;
use App\Filament\Resources\PotensiResource\RelationManagers;
use App\Models\Potensi;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class PotensiResource extends Resource
{
    protected static ?string $model = Potensi::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    protected static ?string $modelLabel = 'Potensi';
    protected static ?string $pluralModelLabel = 'Potensi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('u_m_k_m_id')
                    ->label('UMKM')
                    ->relationship('u_m_k_m', 'nama')
                    ->searchable()
                    ->preload()
                    ->required(),

                TextInput::make('nama')
                    ->label('Nama Produk')
                    ->required()
                    ->maxLength(255),

                TextInput::make('harga')
                    ->label('Harga')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),

                TextInput::make('satuan')
                    ->label('Satuan')
                    ->helperText('misalnya: pcs, kg')
                    ->required()
                    ->maxLength(255),
                Repeater::make('gambar_potensis')
                    ->label('Gambar Potensi')
                    ->relationship()
                    ->schema([
                        FileUpload::make('gambar')
                            ->directory('potensi')
                            ->image()
                            ->imagePreviewHeight('200')
                            ->label('Gambar')
                            ->required(),
                    ])
                    ->columns(1)
                    ->createItemButtonLabel('Tambah Gambar')
                    ->collapsible(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('nama')
                    ->label('Produk')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('u_m_k_m.nama')
                    ->label('UMKM')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('harga')
                    ->money('IDR', true)
                    ->sortable(),

                TextColumn::make('satuan')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->hidden()
                    ->date('d M Y')
                    ->label('Tanggal Buat'),

            ])
            ->actions([
                ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
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
            'index' => Pages\ListPotensis::route('/'),
            'create' => Pages\CreatePotensi::route('/create'),
            'edit' => Pages\EditPotensi::route('/{record}/edit'),
        ];
    }
}
