<?php

namespace App\Http\ViewComposers\Agent;

use App\Repositories\AgentRepository;
use Illuminate\View\View;

class SidebarComposer
{

    /**
     * The agent repository implementation.
     *
     * @var AgentRepository
     */
    protected $agents;

    /**
     * Create a new sidebar composer.
     *
     * @param  AgentRepository $agents
     * @return void
     */
    public function __construct(
        AgentRepository $agents
    ){
        $this->agents = $agents;
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
