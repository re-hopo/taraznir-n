<?php

namespace Modules\News\Http\Controllers;


use App\Trait\CommonApiTrait;
use Illuminate\Routing\Controller;
use Modules\News\Models\News;

class NewsController extends Controller
{
    use CommonApiTrait;

    public static string $model = News::class;
}
