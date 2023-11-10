<?php

namespace Modules\Project\Http\Controllers;

use Illuminate\Routing\Controller;
use Modules\Project\Models\Project;
use Modules\Theme\Trait\CommonApiTrait;

class ProjectController extends Controller
{
    use CommonApiTrait;

    public static string $model = Project::class;
}
