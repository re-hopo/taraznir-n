<?php

namespace Modules\Tutorial\Http\Controllers;


use Illuminate\Routing\Controller;
use Modules\Theme\Trait\CommonApiTrait;
use Modules\Tutorial\Models\Tutorial;

class TutorialController extends Controller
{


    use CommonApiTrait;

    public static string $model = Tutorial::class;
}
