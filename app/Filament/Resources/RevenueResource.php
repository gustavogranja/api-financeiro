<?php

namespace App\Filament\Resources;

use App\Filament\Resources\RevenueResource\Pages;
use App\Filament\Resources\RevenueResource\RelationManagers;
use App\Models\Revenue;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RevenueResource extends Resource
{
    protected static ?string $model = Revenue::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('account_id')
                ->label('Conta')
                ->relationship('account', 'institute')
                ->required(),
                Select::make('type_of_receipt')
                ->label('Forma de Recebimento')
                ->options([
                    'pix' => 'PIX',
                    'cheque' => 'Cheque',
                    'dinheiro' => 'Dinheiro',
                    'transferencia' => 'TED',
                    'outros' => 'Outros'
                ])
                ->required(),
                TextInput::make('value')
                ->name('Qual o valor?')
                ->numeric()
                ->required(),
                TextInput::make('discription')
                ->name('Descrição do recebimento')
                ->required()
                ->maxLength(255),
                DatePicker::make('date_of_receipt')
                ->native(false)
                ->displayFormat('d/m/Y')
                ->name('Data de Recebimento')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('account.institute'),
                TextColumn::make('type_of_receipt'),
                TextColumn::make('value'),
                TextColumn::make('discription'),
                TextColumn::make('date_of_receipt')
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
            'index' => Pages\ListRevenues::route('/'),
            'create' => Pages\CreateRevenue::route('/create'),
            'edit' => Pages\EditRevenue::route('/{record}/edit'),
        ];
    }
}
