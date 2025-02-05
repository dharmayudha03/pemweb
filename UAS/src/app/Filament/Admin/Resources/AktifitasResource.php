<?php

namespace App\Filament\Admin\Resources;

use App\Filament\Admin\Resources\AktifitasResource\Pages;
use App\Filament\Admin\Resources\AktifitasResource\RelationManagers;
use App\Models\Aktifitas;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AktifitasResource extends Resource
{
    protected static ?string $model = Aktifitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Card::make('Pilih Nama Pasien')
                    ->schema([
                        Forms\Components\Select::make('user_id')
                            ->relationship('user', 'name')
                            ->required()
                            ->columnSpanFull(),
                    ]),
                Forms\Components\Section::make('Input Kegiatan Kesehatan')
                    ->schema([
                        Forms\Components\Select::make('jenis_aktivitas')
                            ->required()
                            ->options([
                                'Lari' => 'Lari',
                                'Bersepeda' => 'Bersepeda',
                                'Renang' => 'Renang',
                                'Angkat Beban' => 'Angkat Beban',
                                'Yoga' => 'Yoga',
                                'Senam' => 'Senam'
                            ])
                            ->reactive()
                            ->afterStateUpdated(function (callable $set, Get $get) {
                                $jenisAktivitas = $get('jenis_aktivitas');
                                if (in_array($jenisAktivitas, ['Senam', 'Renang', 'Angkat Beban', 'Yoga'])) {
                                    $set('jarak', 0);
                                }
                                $set('kalori', 0);
                            }),
                        Forms\Components\TextInput::make('durasi')
                            ->required()
                            ->suffix('menit')
                            ->numeric()
                            ->reactive()
                            ->debounce(1000)
                            ->maxLength(5)
                            ->afterStateUpdated(function (callable $set, Get $get) {
                                $jenisAktivitas = $get('jenis_aktivitas');
                                $durasi = (int) $get('durasi');
                                $jarak = (float) $get('jarak');

                                if (in_array($jenisAktivitas, ['Lari', 'Bersepeda']) && $durasi > 0 && $jarak > 0) {
                                    $set('kalori', ($durasi * 7) + ($jarak * 50));
                                } elseif (in_array($jenisAktivitas, ['Senam', 'Renang', 'Angkat Beban', 'Yoga']) && $durasi > 0) {
                                    $set('kalori', $durasi * 5);
                                } else {
                                    $set('kalori', 0);
                                }
                            }),
                        Forms\Components\TextInput::make('jarak')
                            ->numeric()
                            ->suffix('Km')
                            ->maxLength(5)
                            ->reactive()
                            ->debounce(1000)
                            ->disabled(fn(Get $get) => in_array($get('jenis_aktivitas'), ['Senam', 'Renang', 'Angkat Beban', 'Yoga']))
                            ->afterStateUpdated(function (callable $set, Get $get) {
                                $jenisAktivitas = $get('jenis_aktivitas');
                                $durasi = (int) $get('durasi');
                                $jarak = (float) $get('jarak');
                                if (in_array($jenisAktivitas, ['Lari', 'Bersepeda']) && $durasi > 0 && $jarak > 0) {
                                    $set('kalori', ($durasi * 7) + ($jarak * 50));
                                }
                            }),
                        Forms\Components\TextInput::make('kalori')
                            ->numeric()
                            ->reactive()
                            ->readOnly(),
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
                Tables\Columns\TextColumn::make('jenis_aktivitas')
                    ->label('Jenis Kegiatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('durasi')
                    ->numeric(),
                Tables\Columns\TextColumn::make('jarak')
                    ->numeric(),
                Tables\Columns\TextColumn::make('kalori')
                    ->numeric(),
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
            'index' => Pages\ListAktifitas::route('/'),
            'create' => Pages\CreateAktifitas::route('/create'),
            'edit' => Pages\EditAktifitas::route('/{record}/edit'),
        ];
    }
}
