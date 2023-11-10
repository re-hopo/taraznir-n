<?php

namespace Modules\Standard\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Standard\Models\Standard;
use Modules\Theme\Trait\CommonApiTrait;

class StandardController extends Controller
{
    use CommonApiTrait;

    public static string $model = Standard::class;

}
