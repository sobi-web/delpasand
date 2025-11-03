<?php

namespace App\Filament\Resources\Exercise\Tools\Pages;

use App\Filament\Resources\Exercise\Tools\ToolResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListTools extends ListRecords
{
    protected static string $resource = ToolResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
