<?php

namespace Modules\Service\Filament\Resources;

use Filament\Forms\Components\Grid;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
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


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(12) ->schema([
                    Grid::make()->schema([
                        self::formTitleAndSlug(),
                        self::formMedia(),
                        self::formSummary(),
                        self::formEditor(),
                        self::formMeta([
                            'question_why_install' => 'سوال بخش اول ',
                            'result_why_install'   => 'پاسخ بخش اول ',
                            'question_why_service' => 'سوال بخش دوم ',
                            'result_why_service'   => 'پاسخ بخش دوم ',
                            'doing_items'          => ' لیست کارها ',
                            'keywords'             => 'کلمات کلیدی',
                            'description'          => 'توضیحات',
                        ]),
                    ])->columnSpan(9 ),
                    Grid::make()->schema([
                        self::formStatusAndChosen(),
                        self::formCategory('service'),
                        self::formCover(),
                    ])->columnSpan(3 ),
                ]),
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                self::tableID(),
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


    public static function getNavigationBadge(): ?string
    {
        return self::getModel()::count();
    }

}
