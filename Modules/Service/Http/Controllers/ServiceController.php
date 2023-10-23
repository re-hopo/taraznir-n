<?php

namespace Modules\Service\Http\Controllers;


use App\Trait\CommonApiTrait;
use Illuminate\Routing\Controller;
use Modules\Service\Models\Service;

class ServiceController extends Controller
{
    use CommonApiTrait;

    public static string $model = Service::class;
}
