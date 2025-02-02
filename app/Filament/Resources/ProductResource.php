<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('sub_category_id')
                    ->relationship('subCategory', 'name_uz')
                    ->required(),
                Forms\Components\TextInput::make('name_uz')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_ru')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('name_en')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('description_uz')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description_ru')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description_en')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\Toggle::make('is_top'),
                Forms\Components\FileUpload::make('icon')
                    ->image()
                    ->directory('product-icons')->image()->disk('public'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('subCategory.name_en')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('name_uz')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_ru')
                    ->searchable(),
                Tables\Columns\TextColumn::make('name_en')
                    ->searchable(),
                Tables\Columns\IconColumn::make('is_top')
                    ->boolean(),
                Tables\Columns\ImageColumn::make('icon'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
