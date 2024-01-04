<?php

namespace Modules\Gallery\Filament\Resources;


use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Gallery\Filament\Resources\GalleryResource\Pages\CreateGallery;
use Modules\Gallery\Filament\Resources\GalleryResource\Pages\EditGallery;
use Modules\Gallery\Filament\Resources\GalleryResource\Pages\ListGalleries;
use Modules\Gallery\Models\Gallery;
use Modules\Theme\Trait\CommonFilamentResource;

class GalleryResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = Gallery::class;

    protected static ?string $label = '  گالری تصاویر  ';
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationGroup = 'پست ها';
    protected static ?int $navigationSort = 1;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(12) ->schema([
                    Grid::make()->schema([
                        Section::make()->schema([
                            TextInput::make('title')
                                ->label('عنون')
                                ->required(),
                            TextInput::make('date')
                                ->label('تاریخ')
                                ->required(),
                        ]),
                        self::formSummary(),

                        Section::make()->schema([
                            SpatieMediaLibraryFileUpload::make('image')
                                ->multiple()
                                ->label('تصویر')
                        ])
                    ])->columnSpan(9 ),
                    Grid::make()->schema([
                        Select::make('status')
                            ->options([
                                'draft' => 'پیش نویس',
                                'publish' => 'منتشر شده'
                            ])
                            ->default('publish')
                            ->columnSpan(6)
                            ->label('وضعیت  '),
                    ])->columnSpan(3 ),
                ]),
            ]);
    }


    /**
     * @throws Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                self::tableCover(),
                self::tableTitle(),
                self::tableStatus(),
            ])
            ->defaultSort('id')
            ->filters(
                self::filters()
            )
            ->actions(
                self::actions()
            )
            ->bulkActions(
                self::bulkActions()
            );
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
            'index'  => ListGalleries::route('/'),
            'create' => CreateGallery::route('/create'),
            'edit'   => EditGallery::route('/{record}/edit'),
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
