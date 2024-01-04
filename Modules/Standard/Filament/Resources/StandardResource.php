<?php

namespace Modules\Standard\Filament\Resources;

use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Standard\Filament\Resources\StandardResource\Pages\CreateStandard;
use Modules\Standard\Filament\Resources\StandardResource\Pages\EditStandard;
use Modules\Standard\Filament\Resources\StandardResource\Pages\ListStandard;
use Modules\Standard\Models\Standard;
use Modules\Theme\Trait\CommonFilamentResource;

class StandardResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = Standard::class;
    protected static ?string $label = '  استاندارد  ';
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
                            'author'      => __('standard::standard.author'),
                            'keywords'    => __('standard::standard.keywords'),
                            'description' => __('standard::standard.description'),
                            'country'     => __('standard::standard.country'),
                            'group'       => __('standard::standard.group'),
                            'presenter'   => __('standard::standard.presenter'),
                        ]),
                    ])->columnSpan(9 ),
                    Grid::make()->schema([
                        self::formStatusAndChosen(),
                        self::formCategory('standard'),
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
            'index'  => ListStandard::route('/'),
            'create' => CreateStandard::route('/create'),
            'edit'   => EditStandard::route('/{record}/edit'),
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
