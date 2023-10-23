<?php

namespace Modules\Catalog\Http\Controllers;

use App\Trait\CommonApiTrait;
use Illuminate\Routing\Controller;
use Modules\Catalog\Models\Catalog;

class CatalogController extends Controller
{
    use CommonApiTrait;

    public static string $model = Catalog::class;

}
