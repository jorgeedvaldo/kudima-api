<?php

namespace App\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ServicesRelationManager extends RelationManager
{
    protected static string $relationship = 'services';

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->required()
                    ->label('My Price'),
                Forms\Components\TextInput::make('duration')
                    ->label('Duration (e.g. 1h)'),
                Forms\Components\Toggle::make('active')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Service')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('aoa')
                    ->label('My Price'),
                Tables\Columns\TextColumn::make('duration')
                    ->label('Duration'),
                Tables\Columns\BooleanColumn::make('active'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->form(fn (Tables\Actions\AttachAction $action): array => [
                        Forms\Components\TextInput::make('price')
                            ->numeric()
                            ->required()
                            ->label('Price'),
                        Forms\Components\TextInput::make('duration')
                            ->label('Duration'),
                        Forms\Components\Toggle::make('active')
                            ->default(true),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make(),
            ]);
    }    
}
