<?php

namespace App\Filament\Resources\Exercise\Tags\Pages;

use App\Filament\Resources\Exercise\Tags\TagResource;
use Filament\Resources\Pages\CreateRecord;

class CreateTag extends CreateRecord
{
    protected static string $resource = TagResource::class;
}
