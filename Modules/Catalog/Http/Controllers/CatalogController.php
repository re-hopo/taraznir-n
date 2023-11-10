<?php

namespace Modules\Catalog\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Catalog\Models\Catalog;
use Modules\Theme\Trait\CommonApiTrait;

class CatalogController extends Controller
{
    use CommonApiTrait;

    public static string $model = Catalog::class;

}
