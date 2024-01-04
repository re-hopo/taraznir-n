<?php

namespace Modules\Catalog\Filament\Resources;

use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Catalog\Filament\Resources\CatalogResource\Pages\CreateCatalog;
use Modules\Catalog\Filament\Resources\CatalogResource\Pages\EditCatalog;
use Modules\Catalog\Filament\Resources\CatalogResource\Pages\ListCatalogs;
use Modules\Catalog\Models\Catalog;
use Modules\Theme\Trait\CommonFilamentResource;

class CatalogResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = Catalog::class;
    protected static ?string $label = '  کاتالوگ  ';
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
                        self::formTitleAndSlug(),
                        self::formCover(),
                        self::formSummary(),
                        self::formMetaKeyOptions([
                            'author'      => __('catalog::catalog.author'),
                            'keywords'    => __('catalog::catalog.keywords'),
                            'description' => __('catalog::catalog.description'),
                            'subject'     => __('catalog::catalog.subject'),
                        ]),
                    ])->columnSpan(9 ),
                    Grid::make()->schema([
                        self::formStatusAndChosen(),
                        self::formCategory('catalog'),
                        self::formAttachment(),
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
            'index'  => ListCatalogs::route('/'),
            'create' => CreateCatalog::route('/create'),
            'edit'   => EditCatalog::route('/{record}/edit'),
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
