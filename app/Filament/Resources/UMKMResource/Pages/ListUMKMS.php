<?php

namespace App\Filament\Resources\UMKMResource\Pages;

use App\Filament\Resources\UMKMResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListUMKMS extends ListRecords
{
    protected static string $resource = UMKMResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\Action::make('gformPengajuan')
                ->label('Pengajuan UMKM')
                ->icon('heroicon-o-document')
                ->url(env('GFORM_URL'))
                ->openUrlInNewTab(),
            Actions\CreateAction::make(),
        ];
    }
}
