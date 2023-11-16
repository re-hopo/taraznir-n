<?php

namespace Modules\Service\Filament\Resources;

use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Model;
use Modules\Service\Filament\Resources\ServiceResource\Pages\CreateService;
use Modules\Service\Filament\Resources\ServiceResource\Pages\EditService;
use Modules\Service\Filament\Resources\ServiceResource\Pages\ListServices;
use Modules\Service\Models\Service;
use Modules\Theme\Trait\CommonFilamentResource;


class ServiceResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = Service::class;
    protected static ?string $label = '   خدمات  ';
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationGroup = 'پست ها';
    protected static ?int $navigationSort = 3;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function can(string $action, ?Model $record = null): bool
    {
        return auth()->user()->isAdmin();
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
                        self::formMetaByTextarea()
                    ])->columnSpan(9 ),
                    Grid::make()->schema([
                        self::formStatusAndChosen(),
                        self::formCategory('service'),
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
                self::tableID('service'),
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



    public static function getPages(): array
    {
        return [
            'index'  => ListServices::route('/'),
            'create' => CreateService::route('/create'),
            'edit'   => EditService::route('/{record}/edit'),
        ];
    }

}
