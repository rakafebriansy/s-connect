<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UMKMResource\Pages;
use App\Filament\Resources\UMKMResource\RelationManagers;
use App\Models\UMKM;
use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\View;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UMKMResource extends Resource
{
    protected static ?string $model = UMKM::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-storefront';
    protected static ?string $modelLabel = 'UMKM';
    protected static ?string $pluralModelLabel = 'UMKM';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nama')
                    ->label('Nama UMKM')
                    ->required()
                    ->maxLength(255),
                TextInput::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->tel()
                    ->required()
                    ->maxLength(20),

                // Grid::make(2)->schema([
                //     View::make('forms.components.gmaps-preview'),
                // ]),

                TextInput::make('longitude')
                    ->label('Longitude')
                    ->required()
                    ->reactive(),

                TextInput::make('latitude')
                    ->label('Latitude')
                    ->required()
                    ->reactive()
            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama UMKM')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('nomor_telepon')
                    ->label('Nomor Telepon')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('latitude')
                    ->label('Latitude')
                    ->sortable(),

                Tables\Columns\TextColumn::make('longitude')
                    ->label('Longitude')
                    ->sortable(),

                ToggleColumn::make('terverifikasi')
                    ->label('Terverifikasi')
                    ->sortable()
                    ->beforeStateUpdated(function ($record, $state) {
                    })
                    ->afterStateUpdated(function ($record, $state) {
                    }),
            ])
            ->filters([
                Tables\Filters\TernaryFilter::make('terverifikasi')
                    ->label('Terverifikasi'),
            ])
            ->actions([
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
            'index' => Pages\ListUMKMS::route('/'),
            'create' => Pages\CreateUMKM::route('/create'),
            'edit' => Pages\EditUMKM::route('/{record}/edit'),
        ];
    }
}
