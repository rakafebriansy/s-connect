<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PengaduanResource\Pages;
use App\Filament\Resources\PengaduanResource\RelationManagers;
use App\Models\Pengaduan;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PengaduanResource extends Resource
{
    protected static ?string $model = Pengaduan::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $modelLabel = 'Pengaduan';
    protected static ?string $pluralModelLabel = 'Pengaduan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('judul')
                    ->label('Judul Pengaduan')
                    ->required()
                    ->maxLength(255),

                TextInput::make('dusun')
                    ->label('Dusun')
                    ->required()
                    ->maxLength(255),

                Select::make('jenis_pengaduan')
                    ->label('Jenis Pengaduan')
                    ->required()
                    ->options([
                        'umum' => 'Umum',
                        'fasilitas' => 'Fasilitas',
                        'sosial' => 'Sosial',
                    ])
                    ->native(false),
                Textarea::make('isi')
                    ->label('Isi Pengaduan')
                    ->required()
                    ->rows(5),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('judul')
                    ->label('Judul')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('dusun')
                    ->label('Dusun')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('jenis_pengaduan')
                    ->label('Jenis Pengaduan')
                    ->formatStateUsing(function ($state) {
                        return match ($state) {
                            'umum' => 'Umum',
                            'fasilitas' => 'Fasilitas',
                            'sosial' => 'Sosial',
                            default => ucfirst($state),
                        };
                    }),
                TextColumn::make('created_at')
                    ->label('Tanggal Pengaduan')
                    ->dateTime('d M Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListPengaduans::route('/'),
            'create' => Pages\CreatePengaduan::route('/create'),
            'edit' => Pages\EditPengaduan::route('/{record}/edit'),
        ];
    }
}
