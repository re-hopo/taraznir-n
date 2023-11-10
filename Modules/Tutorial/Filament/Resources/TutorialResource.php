<?php

namespace Modules\Tutorial\Filament\Resources;

use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Theme\Trait\CommonFilamentResource;
use Modules\Tutorial\Filament\Resources\TutorialResource\Pages\CreateTutorial;
use Modules\Tutorial\Filament\Resources\TutorialResource\Pages\EditTutorial;
use Modules\Tutorial\Filament\Resources\TutorialResource\Pages\ListTutorials;
use Modules\Tutorial\Models\Tutorial;

class TutorialResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = Tutorial::class;

    protected static ?string $label = ' آموزش تصویری ';
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationGroup = 'پست ها';
    protected static ?int $navigationSort = 2;

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
                            'client'     => 'مشتری',
                            'year'       => 'سال اجر',
                            'location'   => 'محل اجرا',
                            'designer'   => 'طراح',
                            'presenter'  => 'مجری',
                            'supervisor' => 'ناظر'
                        ]),
                    ])->columnSpan(9 ),
                    Grid::make()->schema([
                        self::formStatusAndChosen(),
                        self::formCategory('tutorial'),
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
                self::tableID('tutorial'),
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
            'index'  => ListTutorials::route('/'),
            'create' => CreateTutorial::route('/create'),
            'edit'   => EditTutorial::route('/{record}/edit'),
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
