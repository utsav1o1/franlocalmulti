<?php

namespace App\Http\ViewComposers\Admin;

use App\Repositories\AdminRepository;
use Illuminate\View\View;

class SidebarComposer
{

    /**
     * The admin repository implementation.
     *
     * @var AdminRepository
     */
    protected $admins;

    /**
     * Create a new sidebar composer.
     *
     * @return void
     */
    public function __construct(
        AdminRepository $admins
    ){
        $this->admins = $admins;
    }

    /**
     * Bind data to the view.
     *
     * @param  View $view
     * @return void
     */
    public function compose(View $view)
    {

    }
}
