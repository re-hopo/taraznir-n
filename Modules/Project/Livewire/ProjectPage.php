<?php

namespace Modules\Project\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Modules\Project\Models\Project;
use Modules\Theme\Helpers\Helpers;
use Modules\Theme\Trait\CommonLivewireComponentTrait;

class ProjectPage extends Component
{
    use CommonLivewireComponentTrait;

    public string $object = Project::class;
    public string $model  = 'project';
    public string $config = 'project.section_limit';
    public $listeners     = ['setSearching' ,'setCategory'];
    protected array $with = ['category' ,'meta' ,'media' ,'user'];
    public $categories;


    public function mount(): void
    {
        $this->limit      = config($this->config ,10);
        $this->categories = self::categories();
    }


    #[Layout('theme::layout.app')]
    public function render():View
    {
        $this->renderQuery();
        return view('project::project-page',[
            'seo' => Helpers::mainPagesSEO()
        ]);
    }


}
