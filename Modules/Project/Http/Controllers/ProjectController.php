<?php

namespace Modules\Project\Http\Controllers;

use App\Trait\CommonApiTrait;
use Illuminate\Routing\Controller;
use Modules\Project\Models\Project;

class ProjectController extends Controller
{
    use CommonApiTrait;

    public static string $model = Project::class;
}
