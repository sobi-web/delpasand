<?php

namespace App\Filament\Resources\Exercise\Tags;

use App\Filament\Resources\Exercise\Tags\Pages\CreateTag;
use App\Filament\Resources\Exercise\Tags\Pages\EditTag;
use App\Filament\Resources\Exercise\Tags\Pages\ListTags;
use App\Filament\Resources\Exercise\Tags\Pages\ViewTag;
use App\Filament\Resources\Exercise\Tags\Schemas\TagForm;
use App\Filament\Resources\Exercise\Tags\Schemas\TagInfolist;
use App\Filament\Resources\Exercise\Tags\Tables\TagsTable;
use App\Models\Exercises\Tag;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class TagResource extends Resource
{
    protected static ?string $model = Tag::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;
    protected static string|null|\UnitEnum $navigationGroup = 'تمرین ها';
    protected static ?string $navigationLabel = 'تگ ها';
    protected static ?string $modelLabel = 'تگ';
    protected static ?string $pluralModelLabel = ' تگ        ها';
    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return TagForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return TagInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return TagsTable::configure($table);
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
            'index' => ListTags::route('/'),
            'create' => CreateTag::route('/create'),
            'view' => ViewTag::route('/{record}'),
            'edit' => EditTag::route('/{record}/edit'),
        ];
    }
}
