<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\PolaMakanResource\Pages;
use App\Filament\Admin\Resources\PolaMakanResource\RelationManagers;
use App\Models\PolaMakan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PolaMakanResource extends Resource
{
    protected static ?string $model = PolaMakan::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Pemantauan Kesehatan';

    protected static ?int $navigationSort = 0;

    protected static ?string $navigationLabel = 'Pola Makan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Pilih Pasien')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required(),
                    ]),
                Forms\Components\Section::make('Input Pola Makan')
                    ->schema([
                        Forms\Components\TextInput::make('makanan')
                            ->required()
                            ->autocomplete()
                            ->autocapitalize()
                            ->maxLength(255)
                            ->reactive()
                            ->datalist([
                                'nasi putih',
                                    'ayam goreng',
                                    'ikan bakar',
                                    'telur rebus',
                                    'tempe goreng',
                                    'tahu goreng',
                                    'soto ayam',
                                    'mie goreng',
                                    'nasi goreng',
                                    'rendang',
                                    'burger',
                                    'pizza',
                                    'kentang goreng',
                                    'donat',
                                    'es krim',
                                    'buah apel',
                                    'buah pisang',
                                    'buah anggur',
                            ])
                            ->afterStateUpdated(function (callable $set, Get $get) {
                                $makanan = strtolower($get('makanan'));

                                // Daftar makanan dan kalorinya
                                $daftarKalori = [
                                    'nasi putih' => 204,
                                    'ayam goreng' => 320,
                                    'ikan bakar' => 180,
                                    'telur rebus' => 70,
                                    'tempe goreng' => 150,
                                    'tahu goreng' => 120,
                                    'soto ayam' => 250,
                                    'mie goreng' => 350,
                                    'nasi goreng' => 400,
                                    'rendang' => 500,
                                    'burger' => 600,
                                    'pizza' => 700,
                                    'kentang goreng' => 365,
                                    'donat' => 250,
                                    'es krim' => 200,
                                    'buah apel' => 95,
                                    'buah pisang' => 105,
                                    'buah anggur' => 62,
                                ];

                                if (array_key_exists($makanan, $daftarKalori)) {
                                    $set('kalori', $daftarKalori[$makanan]);
                                    $set('peringatan', null); // Hapus peringatan jika makanan ditemukan
                                } else {
                                    $set('kalori', 0);
                                    $set('peringatan', 'Makanan tidak ditemukan, harap cek kembali atau tambahkan manual.');
                                }
                            }),
                        Forms\Components\TextInput::make('kalori')
                            ->numeric()
                            ->readOnly(),
                        Forms\Components\DateTimePicker::make('waktu_makan')
                            ->required(),
                    ])->columns(3)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Nama Pasien')
                    ->searchable(),
                Tables\Columns\TextColumn::make('makanan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('kalori')
                    ->numeric(),
                Tables\Columns\TextColumn::make('waktu_makan')
                    ->label('Waktu Makan')
                    ->dateTime()
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
            'index' => Pages\ListPolaMakans::route('/'),
            'create' => Pages\CreatePolaMakan::route('/create'),
            'edit' => Pages\EditPolaMakan::route('/{record}/edit'),
        ];
    }
}
