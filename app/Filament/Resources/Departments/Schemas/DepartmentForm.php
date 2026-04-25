<?php

namespace App\Filament\Resources\Departments\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class DepartmentForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('department_code')
                    ->label('Kode Departemen')
                    ->required()
                    ->maxLength(8),
                TextInput::make('department_name')
                    ->label('Nama Departemen')
                    ->required()
                    ->maxLength(32),
            ]);
    }
}
