<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TeamResource\Pages;
use App\Filament\Resources\TeamResource\RelationManagers;
use App\Models\Team;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TeamResource extends Resource
{
    protected static ?string $model = Team::class;

    protected static ?string $navigationIcon = 'heroicon-s-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->required(),
                TextInput::make('position')->required(),
                TextInput::make('email'),
                TextInput::make('number')->prefix('+880'),
                FileUpload::make('image')->image()->imageEditor()->disk('public')->columnSpanFull()->optimize('webp'),
                TextInput::make('fb')->label('facebook url')->columnSpan(1)->prefix('https://facebook.com/')->prefixIcon('heroicon-o-globe-alt'),
                TextInput::make('tw')->label('Twitter url')->columnSpan(1)->prefix('https://x.com/')->prefixIcon('heroicon-o-globe-alt'),
                TextInput::make('in')->label('Instagram url')->columnSpan(1)->prefix('https://instagram.com/')->prefixIcon('heroicon-o-globe-alt'),
                Select::make('status')->options([
                    "Working"=> 1,
                    "Inactive"=>0
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name')->searchable(),
                TextColumn::make('number')->prefix('+880 ')->searchable(),
                TextColumn::make('position')->searchable(),
                SelectColumn::make('status')->options([
                    1=> 'Employed',
                    0=>'Kicked Out'
                ])

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListTeams::route('/'),
            'create' => Pages\CreateTeam::route('/create'),
            'edit' => Pages\EditTeam::route('/{record}/edit'),
        ];
    }
}
