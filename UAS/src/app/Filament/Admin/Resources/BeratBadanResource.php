<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\BeratBadanResource\Pages;
use App\Filament\Admin\Resources\BeratBadanResource\RelationManagers;
use App\Models\BeratBadan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BeratBadanResource extends Resource
{
    protected static ?string $model = BeratBadan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pemantauan Kesehatan';

    protected static ?int $navigationSort = 1;

    protected static ?string $navigationLabel = 'Berat Badan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Input Berat Badan')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('berat')
                            ->required()
                            ->maxLength(5)
                            ->numeric(),
                        Forms\Components\DatePicker::make('tanggal')
                            ->required(),
                    ])->columns(2)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Pasien')
                    ->searchable(),
                Tables\Columns\TextColumn::make('berat')
                    ->numeric(),
                Tables\Columns\TextColumn::make('tanggal')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('created_at', 'desc')
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
            'index' => Pages\ListBeratBadans::route('/'),
            'create' => Pages\CreateBeratBadan::route('/create'),
            'edit' => Pages\EditBeratBadan::route('/{record}/edit'),
        ];
    }
}
