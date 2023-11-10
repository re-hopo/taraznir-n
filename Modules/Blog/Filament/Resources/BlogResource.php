<?php

namespace Modules\Blog\Filament\Resources;


use Exception;
use Filament\Forms\Components\Grid;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Blog\Filament\Resources\BlogResource\Pages\CreateBlog;
use Modules\Blog\Filament\Resources\BlogResource\Pages\EditBlog;
use Modules\Blog\Filament\Resources\BlogResource\Pages\ListBlogs;
use Modules\Blog\Models\Blog;
use Modules\Theme\Trait\CommonFilamentResource;

class BlogResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = Blog::class;

    protected static ?string $label = '  مقاله  ';
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
                        self::formEditor(),
                        self::formMetaKeyOptions([
                            'author'      => ' نویسنده',
                            'keywords'    => 'کلمات کلیدی',
                            'description' => 'توضیحات',
                        ]),
                    ])->columnSpan(9 ),
                    Grid::make()->schema([
                        self::formStatusAndChosen(),
                        self::formCategory('blog'),
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
            'index'  => ListBlogs::route('/'),
            'create' => CreateBlog::route('/create'),
            'edit'   => EditBlog::route('/{record}/edit'),
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
