<?php

namespace Modules\News\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\News\Models\News;
use Modules\Theme\Trait\CommonApiTrait;

class NewsController extends Controller
{
    use CommonApiTrait;

    public static string $model = News::class;
}
