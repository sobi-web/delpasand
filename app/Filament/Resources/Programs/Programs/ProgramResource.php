<?php

namespace App\Filament\Resources\Programs\Programs;

use App\Filament\Resources\Programs\Programs\Pages\CreateProgram;
use App\Filament\Resources\Programs\Programs\Pages\EditProgram;
use App\Filament\Resources\Programs\Programs\Pages\ListPrograms;
use App\Filament\Resources\Programs\Programs\Pages\ViewProgram;
use App\Filament\Resources\Programs\Programs\Schemas\ProgramForm;
use App\Filament\Resources\Programs\Programs\Schemas\ProgramInfolist;
use App\Filament\Resources\Programs\Programs\Tables\ProgramsTable;
use App\Models\Programs\Program;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ProgramResource extends Resource
{
    protected static ?string $model = Program::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;
    protected static ?string $modelLabel = 'برنامه تمرینی';
    protected static ?string $pluralModelLabel = 'برنامه‌ها';

    protected static ?string $recordTitleAttribute = 'Program';

    public static function form(Schema $schema): Schema
    {
        return ProgramForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return ProgramInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ProgramsTable::configure($table);
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
            'index' => ListPrograms::route('/'),
            'create' => CreateProgram::route('/create'),
            'view' => ViewProgram::route('/{record}'),
            'edit' => EditProgram::route('/{record}/edit'),
        ];
    }
}
