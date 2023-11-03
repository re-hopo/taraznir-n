<?php

namespace App\Trait;

use Exception;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Theme\Models\Category;

trait CommonFilamentResource
{


    public static function formTitleAndSlug(): Section
    {
        return
            Section::make()->schema([
                TextInput::make('title')
                    ->label('عنون')
                    ->required(),
                TextInput::make('slug')
                    ->label('نامک')
                    ->required() ,
            ]);
    }

    public static function formSummary(): Section
    {
        return
            Section::make()->schema([
                Textarea::make('summary')
                    ->label('خلاصه')
            ]);
    }

    public static function formEditor($key = 'content'): Section
    {
        return
            Section::make()->schema([
                RichEditor::make($key)
                    ->label('محتوا')
            ]);
    }

    public static function formTitle(): TextInput
    {
        return
            TextInput::make('title')
                ->label('عنوان')
                ->required();
    }


    public static function formKey(): TextInput
    {
        return
            TextInput::make('key')
                ->label('کلید')
                ->required();
    }

    public static function formToggleTextType(): Toggle
    {
        return
            Toggle::make('type')
                ->label('Save As HTML');
    }





    public static function formStatusAndChosen(): Section
    {
        return
            Section::make()->schema([
                Select::make('status')
                    ->options([
                        'draft' => 'پیش نویس',
                        'publish' => 'منتشر شده'
                    ])
                    ->default('publish')
                    ->columnSpan(6)
                    ->label('وضعیت  ') ,
                TextInput::make('chosen' )
                    ->default(0)
                    ->columnSpan(6 )
                    ->label('انتخاب شده '),
            ]);
    }



    public static function formCategory($model): Section
    {
        return
            Section::make()->schema([
                Select::make('category')
                    ->relationship( 'category' ,'slug' ,
                        fn () => Category::where('model' ,'=' ,$model )
                    )
                    ->multiple()
                    ->label('دسته بندی')
            ]);
    }

    public static function formAttachment(): Section
    {
        return
            Section::make()->schema([
                SpatieMediaLibraryFileUpload::make('attachment')
                    ->multiple()
                    ->label('فایل ضمیمه')
            ]);
    }


    public static function formMetaKeyOptions( array $options ): Section
    {
        return
            Section::make()->schema([
                Repeater::make('meta')
                    ->label('متا')
                    ->schema([
                        Select::make('key')
                            ->options( $options )
                            ->required(),
                        Textarea::make('value')
                            ->label('مقدار')
                    ])
                    ->relationship('meta')
                    ->collapsible()
                    ->defaultItems(0),
            ]);
    }


    public static function formMetaTextAndAttachment(): Section
    {
        return
            Section::make()
                ->schema([
                    Repeater::make('meta')
                        ->label('متا')
                        ->schema([
                            TextInput::make('key')
                                ->required(),
                            Textarea::make('value')
                                ->label('مقدار'),
                        ])
                        ->relationship('meta')
                        ->collapsible()
                        ->columns()
                        ->defaultItems(0),
            ]);
    }




    public static function tableTitle(): TextColumn
    {
        return
            TextColumn::make('title')
                ->sortable()
                ->label('عنوان');
    }

    public static function tableStatus(): TextColumn
    {
        return
            TextColumn::make('status')
                ->label('وضعیت');
    }


    /**
     * @throws Exception
     */
    public static function filters(): array
    {
        return [
            TrashedFilter::make(),
        ];
    }

    /**
     * @throws Exception
     */
    public static function actions(): array
    {
        return [
            DeleteAction::make(),
            ForceDeleteAction::make(),
            RestoreAction::make(),
        ];
    }

    /**
     * @throws Exception
     */
    public static function bulkActions(): array
    {
        return [
            BulkActionGroup::make([
                DeleteBulkAction::make(),
                ForceDeleteBulkAction::make(),
                RestoreBulkAction::make(),
            ]),
        ];
    }


    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

}
