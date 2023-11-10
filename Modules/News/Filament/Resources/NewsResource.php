<?php

namespace Modules\News\Filament\Resources;

use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\News\Filament\Resources\NewsResource\Pages\CreateNews;
use Modules\News\Filament\Resources\NewsResource\Pages\EditNews;
use Modules\News\Filament\Resources\NewsResource\Pages\ListNews;
use Modules\News\Models\News;
use Modules\Theme\Trait\CommonFilamentResource;

class NewsResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = News::class;
    protected static ?string $label = '  اخبار  ';
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationGroup = 'پست ها';
    protected static ?int $navigationSort = 3;
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
                        self::formEditor(),
                        self::formMetaKeyOptions([
                            'author' => 'نویسنده',
                        ]),
                    ])->columnSpan(9 ),
                    Grid::make()->schema([
                        self::formStatusAndChosen(),
                        self::formCategory('news'),
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
                self::tableID('news'),
                self::tableCategory(),
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
            'index'  => ListNews::route('/'),
            'create' => CreateNews::route('/create'),
            'edit'   => EditNews::route('/{record}/edit'),
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
