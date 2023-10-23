<?php

namespace Modules\Standard\Http\Controllers;

use App\Trait\CommonApiTrait;
use Illuminate\Routing\Controller;
use Modules\Standard\Models\Standard;

class StandardController extends Controller
{
    use CommonApiTrait;

    public static string $model = Standard::class;

}
