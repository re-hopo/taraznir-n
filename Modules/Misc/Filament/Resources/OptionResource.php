<?php

namespace Modules\Misc\Filament\Resources;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Misc\Filament\Resources\OptionResource\Pages;
use Modules\Misc\Filament\Resources\OptionResource\RelationManagers;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Modules\Misc\Models\Option;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Filament\Forms;

class OptionResource extends Resource
{
    protected static ?string $model = Option::class;
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $label = 'Options';
    protected static ?string $navigationGroup = 'setting';
    protected static ?int $navigationSort = 1;
    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static  function can(string $action, ?Model $record = null): bool
    {
        return auth()->user()->isAdmin() || auth()->user()->getAllPermissions()->where('name' ,'Option')->count();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    Forms\Components\TextInput::make('title')
                        ->label('Title')
                        ->required(),
                    Forms\Components\TextInput::make('key')
                        ->label('Key')
                        ->required() ,
                    Forms\Components\Toggle::make('type')
                        ->onColor('yellow')
                        ->offColor('black')
                        ->label('Save As HTML'),
                    TinyEditor::make('value')
                        ->label('Content'),
                    SpatieMediaLibraryFileUpload::make('cover')
                        ->enableReordering()
                        ->multiple()
                        ->placeholder('Upload Attachment')
                        ->label('Attachment')
                        ->imagePreviewHeight(100)  ,
                ]),
                Card::make()->schema([
                    TableRepeater::make('meta')
                        ->label('Meta')
                        ->relationship('meta')
                        ->schema([
                            Forms\Components\TextInput::make('key')
                                ->label('Key')
                                ->required(),
                            Forms\Components\TextInput::make('value')
                                ->label('Value')
                                ->required(),
                        ])
                        ->collapsible()
                        ->defaultItems(0),
                ]),
            ]);


    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                SpatieMediaLibraryImageColumn::make('cover')
                    ->label('تصویر') ,

                Tables\Columns\TextColumn::make('title')
                    ->label('Title') ,

                Tables\Columns\TextColumn::make('key')
                    ->label('Key')
                    ->sortable(),
            ])
            ->defaultSort('key')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListOptions::route('/'),
            'create' => Pages\CreateOption::route('/create'),
            'edit' => Pages\EditOption::route('/{record}/edit'),
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
