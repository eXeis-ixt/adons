<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\ImageColumn;

class ServiceResource extends Resource
{
    protected static ?string $model = Service::class;
    protected static ?string $navigationGroup = 'Contents';

    protected static ?string $navigationIcon = 'heroicon-o-arrow-top-right-on-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Tabs::make('Seo')->tabs([
                    Tab::make('Details')->schema([

                            TextInput::make('title')
                            ->live()
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))->required(),
                            TextInput::make('slug')->required()->minLength(1)->unique(ignoreRecord: true)->maxLength(150),

                            TextInput::make('short_des')->required(),
                            FileUpload::make('image')->image()->imageEditor()->disk('public')->optimize('webp')->columnSpanFull(),
                            RichEditor::make('des')->columnSpanFull()->required(),
                            TextInput::make('icon_class'),
                            Toggle::make('status')->columnSpanFull(),

                    ]),
                    Tab::make('SEO')->schema([
                        TextInput::make('meta_description'),
                        TextInput::make('keywords')->label('Use coma to separate')->placeholder('Keywords')
                    ])
                ])->columnSpanFull(),


            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title'),
                TextColumn::make('short_des'),
                TextColumn::make('slug'),
                ToggleColumn::make('status'),
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
            'index' => Pages\ListServices::route('/'),
            'create' => Pages\CreateService::route('/create'),
            'edit' => Pages\EditService::route('/{record}/edit'),
        ];
    }
}
