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
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\Wizard\Step;
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
use Illuminate\Support\Facades\Storage;

class BlogResource extends Resource
{
    protected static ?string $model = Blog::class;
    protected static ?string $navigationGroup = 'Contents';
    protected static ?string $navigationIcon = 'heroicon-o-pencil-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                    Wizard::make([
                        Step::make('Title And Slug')->schema([

                            TextInput::make('title') ->live(onBlur: true)
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))->required(),

                            TextInput::make('slug')->required(),

                        ])->columnSpanFull(),

                        Step::make('Details')->schema([
                            TextInput::make('author')->placeholder('Author'),
                            FileUpload::make('image')->disk('public')->imageEditor()->columnSpan('full')->optimize('webp'),

                            RichEditor::make('content')->required()->label('Write your blog content')->columnSpanFull()->fileAttachmentsDisk('public'),
                        ])->columnSpanFull(),


                        Step::make('Category')->schema([

                            Select::make('category_id')->options(Category::all()->pluck('name','id'))->label('Select a category'),
                            Select::make('status')->options([
                                1=> 'Active',
                                0=>'Disabled'
                            ]),

                        ])->columnSpanFull(),

                        Step::make('SEO')->schema([
                            Textarea::make('meta_description'),
                            TextInput::make('keywords')->label('Use coma to separate')->placeholder('Keywords')
                        ])->columnSpanFull(),

                    ])->columnSpanFull(),






            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('title')->searchable(),
                TextColumn::make('author')->searchable(),
                SelectColumn::make('status')->options([
                    1=> 'Active',
                    0=>'Disabled'
                ]),
                // TextColumn::make('category_id'),
                TextColumn::make('created_at')->since(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make()->after(function (Blog $record){
                    if ($record->image) {
                        Storage::disk('public')->delete($record->image);
                     }


                }),
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
