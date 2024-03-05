<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogResource\Pages;
use App\Filament\Resources\BlogResource\RelationManagers;
use App\Models\Blog;
use App\Models\Category;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationGroup = 'Contents';
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Blog')->tabs([
                    Tab::make('Details')->schema([
                        TextInput::make('title') ->live()
                        ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))->required(),

                        TextInput::make('slug')->required(),
                        // FileUpload::make('image'),
                        FileUpload::make('image')->disk('public')->imageEditor()->columnSpan('full')->optimize('webp'),

                        RichEditor::make('content')->required()->label('Write your blog content')->columnSpanFull(),
                        TextInput::make('author')->placeholder('Author'),
                        Select::make('category_id')->options(Category::all()->pluck('name','id'))->label('Select a category'),
                        Select::make('status')->options([
                            1=> 'Active',
                            0=>'Disabled'
                        ]),


                    ]),
                    Tab::make('SEO')->schema([
                        Textarea::make('meta_description'),
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
                TextColumn::make('title')->searchable(),
                TextColumn::make('slug'),
                TextColumn::make('author')->searchable(),
                SelectColumn::make('status')->options([
                    1=> 'Active',
                    0=>'Disabled'
                ])
                // TextColumn::make('category_id'),
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlog::route('/create'),
            'edit' => Pages\EditBlog::route('/{record}/edit'),
        ];
    }
}
