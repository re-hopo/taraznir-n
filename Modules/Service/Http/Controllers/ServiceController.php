<?php

namespace Modules\Service\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Service\Models\Service;
use Modules\Theme\Trait\CommonApiTrait;

class ServiceController extends Controller
{
    use CommonApiTrait;

    public static string $model = Service::class;
}
