<?php

namespace Modules\Tutorial\Http\Controllers;


use App\Trait\CommonApiTrait;
use Illuminate\Routing\Controller;
use Modules\Tutorial\Models\Tutorial;

class TutorialController extends Controller
{


    use CommonApiTrait;

    public static string $model = Tutorial::class;
}
