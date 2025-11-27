<?php

namespace App\Filament\Resources\Exercise\Tools;

use App\Filament\Resources\Exercise\Tools\Pages\CreateTool;
use App\Filament\Resources\Exercise\Tools\Pages\EditTool;
use App\Filament\Resources\Exercise\Tools\Pages\ListTools;
use App\Filament\Resources\Exercise\Tools\Pages\ViewTool;
use App\Filament\Resources\Exercise\Tools\Schemas\ToolForm;
use App\Filament\Resources\Exercise\Tools\Schemas\ToolInfolist;
use App\Filament\Resources\Exercise\Tools\Tables\ToolsTable;
use App\Models\Exercises\Tool;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ToolResource extends Resource
{
    protected static ?string $model = Tool::class;
    protected static ?string $modelLabel = 'ابزار تمرین';
    protected static ?string $pluralModelLabel = 'ابزار ها';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedWrenchScrewdriver;
    protected static string|null|\UnitEnum $navigationGroup = 'تمرین ها';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return ToolForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ToolInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ToolsTable::configure($table);
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
            'index' => ListTools::route('/'),
            'create' => CreateTool::route('/create'),
            'view' => ViewTool::route('/{record}'),
            'edit' => EditTool::route('/{record}/edit'),
        ];
    }
}
