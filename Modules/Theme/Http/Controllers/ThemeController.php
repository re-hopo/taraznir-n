<?php

namespace Modules\Theme\Http\Controllers;

use Illuminate\Routing\Controller;

class ThemeController extends Controller
{
    public static array $models = [
        'Blog'  => 'مقاله',
        'Blogs' => 'مقاله‌های',
    ];
}
