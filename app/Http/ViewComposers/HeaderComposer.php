<?php

namespace App\Http\ViewComposers;

use App\Repositories\ProjectTypeRepository;
use App\Repositories\PropertyCategoryRepository;
use Illuminate\View\View;

class HeaderComposer
{
    private $projectTypeRepo;

    /**
     * Create a new header composer.
     *
     * @return void
     */
    public function __construct(PropertyCategoryRepository $categories, ProjectTypeRepository $projectTypeRepo)
    {
        $this->categories = $categories;
        $this->projectTypeRepo = $projectTypeRepo;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {
        $user = auth()->guard('user') ? auth()->guard('user')->user() : [];
        $view->withUser($user)
             ->withProjectTypes($this->projectTypeRepo->getProjectTypeMenus());
    }
}
