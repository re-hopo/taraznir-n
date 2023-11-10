<?php

namespace Modules\Project\Livewire;

use Livewire\Component;
use Modules\Project\Models\Project;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Models\Category;

class ProjectSection extends Component
{
    public function render()
    {

        $items = Helpers::redisHandler( 'project_section_items' ,function (){
            return Project::with(['category' ,'meta'])->get();
        });

        $cats = Helpers::redisHandler( 'project_section_cats' ,function (){
            return Category::with(['project'])->where('model' ,'project')->get();
        });

        return view('project::project-section' ,[
            'items' => $items,
            'cats'  => $cats
        ]);
    }
}
