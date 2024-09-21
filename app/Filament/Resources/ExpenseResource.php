<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ExpenseResource\Pages;
use App\Filament\Resources\ExpenseResource\RelationManagers;
use App\Models\Expense;
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

class ExpenseResource extends Resource
{
    protected static ?string $model = Expense::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('type_expense')
                ->name('Descrição da despesa')
                ->required()
                ->maxLength(255),
                Select::make('payment')
                ->name('Forma de Pagamento')
                ->options([
                    'credito' => 'Cartão de Credito',
                    'debito_pix' => 'Cartão Debito/PIX',
                    'cheque' => 'Cheque',
                    'outros' => 'Outros'
                ])
                ->required(),
                DatePicker::make('day_payment')
                ->name('Data do pagamento')
                ->required()
                ->maxDate(now()),
                Select::make('accounts_id')
                ->name('Em qual conta que foi paga?')
                ->relationship('account', 'institute')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('type_of_payment'),
                TextColumn::make('valeu'),
                TextColumn::make('discription'),
                TextColumn::make('date_of_payment')
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
            'index' => Pages\ListExpenses::route('/'),
            'create' => Pages\CreateExpense::route('/create'),
            'edit' => Pages\EditExpense::route('/{record}/edit'),
        ];
    }
}
