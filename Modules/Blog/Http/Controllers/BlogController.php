<?php

namespace Modules\Blog\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Blog\Models\Blog;
use Modules\Theme\Trait\CommonApiTrait;

class BlogController extends Controller
{
    use CommonApiTrait;

    public static string $model = Blog::class;

}
