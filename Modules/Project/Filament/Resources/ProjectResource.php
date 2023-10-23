<?php

namespace Modules\Project\Filament\Resources;

use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\SpatieMediaLibraryFileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\SpatieMediaLibraryImageColumn;
use Icetalker\FilamentTableRepeater\Forms\Components\TableRepeater;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Modules\Misc\Models\Category;
use Modules\Project\Filament\Resources\ProjectResource\Pages;
use Modules\Project\Filament\Resources\ProjectResource\RelationManagers;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Modules\Project\Models\Project;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;

class ProjectResource extends Resource
{
    protected static ?string $model = Project::class;
    protected static ?string $label = '  پروژه ها  ';
    protected static ?string $navigationIcon = 'heroicon-o-folder-open';
    protected static ?string $navigationGroup = 'پست ها';
    protected static ?int $navigationSort = 2;
    protected static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }


    public static function form(Form $form): Form
    {
        return $form

            ->schema([
                Grid::make()->columns(12) ->schema([
                    Grid::make()->schema([

                        Card::make()->schema([
                             TextInput::make('title')
                                ->label('عنون')
                                ->required(),
                             TextInput::make('slug')
                                ->label('نامک')
                                ->required() ,
                        ]),

                        Card::make()->schema([
                            TinyEditor::make('content')
                                ->showMenuBar()
                                ->label('محتوا') ,

                            SpatieMediaLibraryFileUpload::make('cover')
                                ->multiple()
                                ->enableReordering()
                                ->placeholder('بارگذاری تصویر بند انگشتی')
                                ->label(' تصویر بند انگشتی ')
                                ->imagePreviewHeight(100),

                            Textarea::make('summary')
                                ->label('خلاصه')
                        ]),

                        Card::make()->schema([
                            TableRepeater::make('meta')
                                ->label('متا')
                                ->relationship('meta')
                                ->schema([
                                    Select::make('key')
                                        ->label('کلید')
                                        ->required()
                                        ->options([
                                            'client'     => 'مشتری',
                                            'year'       => 'سال اجر',
                                            'location'   => 'محل اجرا',
                                            'designer'   => 'طراح',
                                            'presenter'  => 'مجری',
                                            'supervisor' => 'ناظر'
                                        ]),
                                    TextInput::make('value')
                                        ->label('مقدار')
                                        ->required(),
                                ])
                                ->collapsible()
                                ->defaultItems(0),
                        ]),

                    ])->columnSpan(9 ),


                    Grid::make()->schema([
                        Card::make()->schema([
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
                        ]),
                        Card::make()->schema([
                            Select::make('category')
                                ->relationship( 'category' ,'slug' ,
                                    fn () => Category::where('model' ,'=' ,'project' )
                                )
                                ->multiple()
                                ->label('دسته بندی')
                        ]),

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
                Tables\Columns\TextColumn::make('id')
                    ->url(fn ($record) => env('APP_URL' ).'/project/'.$record->slug ,true )
                    ->formatStateUsing(fn (string $state): string => __("{$state} #") )
                    ->label('شناسه') ,

                SpatieMediaLibraryImageColumn::make('cover')
                    ->label('تصویر') ,

                Tables\Columns\TextColumn::make('title')
                    ->sortable()
                    ->label('عنوان') ,
                Tables\Columns\TextColumn::make('status')
                    ->enum([
                        'draft' => 'پیش نویس',
                        'publish' => 'منتشر شده'
                    ])
                    ->label('وضعیت'),
            ])
            ->defaultSort('id')

            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
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
            'index' => Pages\ListProjects::route('/'),
            'create' => Pages\CreateProject::route('/create'),
            'edit' => Pages\EditProject::route('/{record}/edit'),
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
