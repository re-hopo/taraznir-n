<?php

namespace Modules\Theme\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Modules\Theme\Filament\Resources\CategoryResource\Pages\CreateCategory;
use Modules\Theme\Filament\Resources\CategoryResource\Pages\EditCategory;
use Modules\Theme\Filament\Resources\CategoryResource\Pages\ListCategories;
use Modules\Theme\Models\Category;
use Modules\Theme\Trait\CommonFilamentResource;

class CategoryResource extends Resource
{
    use CommonFilamentResource;

    protected static ?string $model = Category::class;
    protected static ?string $label = '  دسته بندی ';
    protected static ?string $navigationIcon = 'heroicon-o-swatch';
    protected static ?string $navigationGroup = 'دسته بندی';
    protected static ?int $navigationSort = 3;
    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                self::formTitle(),
                self::formSlug(),
                self::formSelectBox(
                    [
                        'blog'     => 'بلاگ',
                        'product'  => 'محصول',
                        'service'  => 'خدمات',
                        'project'  => 'پروژه',
                        'standard' => 'استاندارد',
                        'category' => 'کاتالوگ',
                        'tutorial' => 'آموزش',
                        'news'     => 'اخبار',
                        'option'   => 'گزینه‌ها',
                    ],
                    'model' ,'نوع پست'
                ),
                self::formDescription(),
                self::formIcon()
            ]);
    }

    /**
     * @throws \Exception
     */
    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                self::tableCover(),
                self::tableTitle(),
                self::tableSlug(),
                TextColumn::make('model')
            ])
            ->filters([
                //
            ])
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
            'index'  => ListCategories::route('/'),
            'create' => CreateCategory::route('/create'),
            'edit'   => EditCategory::route('/{record}/edit'),
        ];
    }
}
