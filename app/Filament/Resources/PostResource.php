<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
               Section::make('Main Post')
               ->columns(2)
               ->schema([
                    // Forms\Components\TextInput::make('user_id')
                    // ->required()
                    // ->numeric(),
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(debounce: 1000)
                   
                    ->maxLength(255)
                    ->afterStateUpdated(function(string $operation,$state,Set $set){
                        if($operation === 'edit') return;

                      $set('slug',Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->unique(ignoreRecord: true)
                    ->maxLength(255),
                Forms\Components\RichEditor::make('body')
                    ->required()
                    ->fileAttachmentsDirectory('posts/images')
                    ->columnSpanFull(),
              
                ]),
               Section::make('Meta')
               ->columns(2)
               ->schema([
                     Forms\Components\FileUpload::make('image')
                    ->required()
                    ->image()
                    ->columnSpanFull()
                    ->directory('posts/thumbnails'),
                    
                Forms\Components\DateTimePicker::make('published_at'),
                Forms\Components\Toggle::make('is_featured')
                    ->required(),
                    Select::make('user_id')
                    ->relationship('author', 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                    Select::make('categories')
                    ->relationship('categories', 'title')
                    ->searchable()
                    ->preload()
                    ->multiple()
                    ->required()
                    ->createOptionForm([
                          Forms\Components\TextInput::make('title')
                    ->live(debounce: 1000)
                    ->required()
                    ->maxLength(255)
                    ->afterStateUpdated(function(string $operation,$state,Set $set){
                        if($operation === 'edit') return;

                      $set('slug',Str::slug($state));
                    }),
                Forms\Components\TextInput::make('slug')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('text_color')
                    ->maxLength(255)
                    ->default(null),
                Forms\Components\TextInput::make('background_color')
                    ->maxLength(255)
                    ->default(null),
                    ]),
               ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('published_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('is_featured')
                    ,
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
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
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
