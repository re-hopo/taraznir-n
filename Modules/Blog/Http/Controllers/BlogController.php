<?php

namespace Modules\Blog\Http\Controllers;

use App\Trait\CommonApiTrait;
use Illuminate\Routing\Controller;
use Modules\Blog\Models\Blog;

class BlogController extends Controller
{
    use CommonApiTrait;

    public static string $model = Blog::class;

}
