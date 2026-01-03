<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CarResource\Pages;
use App\Models\Car;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class CarResource extends Resource
{
    protected static ?string $model = Car::class;
    protected static ?string $navigationIcon = 'heroicon-o-truck'; // Ganti ikonnya

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required(),
                Forms\Components\TextInput::make('brand')
                    ->required(),
                Forms\Components\TextInput::make('year')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('price')
                    ->numeric()
                    ->prefix('Rp')
                    ->required(),
                Forms\Components\RichEditor::make('description')
                    ->columnSpanFull()
                    ->required(),
                Forms\Components\Select::make('transmission')
                    ->options(['Automatic' => 'Automatic', 'Manual' => 'Manual'])
                    ->required(),
                Forms\Components\TextInput::make('fuel_type')
                    ->label('Fuel Type')
                    ->required(),
                Forms\Components\TextInput::make('engine_capacity')
                    ->label('Engine Capacity')
                    ->required(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->multiple() // <-- Add this to allow multiple files
                    ->reorderable() // <-- (Optional) Add this for better UX
                    ->appendFiles() // <-- (Optional) For editing, allows adding more images without replacing existing ones
                    ->directory('car-images'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('brand')
                    ->searchable(),
                Tables\Columns\TextColumn::make('price')
                    ->money('IDR')->sortable(),
                Tables\Columns\TextColumn::make('year')
                    ->sortable(),
            ])
            ->filters([
                //
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCars::route('/'),
            'create' => Pages\CreateCar::route('/create'),
            'edit' => Pages\EditCar::route('/{record}/edit'),
        ];
    }
}
