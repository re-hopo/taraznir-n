<?php

namespace Modules\Theme\Filament\Resources;



use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Theme\Filament\Resources\OptionResource\Pages\CreateOption;
use Modules\Theme\Filament\Resources\OptionResource\Pages\EditOption;
use Modules\Theme\Filament\Resources\OptionResource\Pages\ListOptions;
use Modules\Theme\Models\Option;
use Modules\Theme\Trait\CommonFilamentResource;

class OptionResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = Option::class;

    protected static ?string $label = ' گزینه‌ها  ';
    protected static ?string $navigationIcon = 'heroicon-o-cog';
    protected static ?string $navigationGroup = 'پست ها';
    protected static ?int $navigationSort = 1;

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static  function can(string $action, ?Model $record = null): bool
    {
        return auth()->user()->isAdmin();
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make()->columns(12)->schema([
                    Grid::make()->schema([
                        self::formTitle(),
                        self::formKey(),
                        self::formToggleTextType(),
                        self::formEditor('value'),
                        self::formMetaByTextarea(),
                    ])->columnSpan(9),

                    Grid::make()->schema([
                        self::formCover(),
                        self::formCategory('option'),
                    ])->columnSpan(3),
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
                self::tableTitle(),
                TextColumn::make('key')
                    ->sortable()
                    ->label('کلید'),
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
            'index' => ListOptions::route('/'),
            'create' => CreateOption::route('/create'),
            'edit' => EditOption::route('/{record}/edit'),
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

