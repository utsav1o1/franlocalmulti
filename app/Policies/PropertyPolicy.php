<?php

namespace App\Policies;

use App\Models\Agent;
use App\Models\Property;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the property.
     *
     * @param  \App\Models\Agent  $agent
     * @param  \App\Models\Property  $property
     * @return mixed
     */
    public function view(Agent $agent, Property $property)
    {
        return $agent->id;
    }

    /**
     * Determine whether the user can create properties.
     *
     * @param  \App\Models\Agent  $agent
     * @return mixed
     */
    public function create(Agent $agent)
    {
        return $agent->id;
    }

    /**
     * Determine whether the user can update the property.
     *
     * @param  \App\Models\Agent  $agent
     * @param  \App\Models\Property  $property
     * @return mixed
     */
    public function update(Agent $agent, Property $property)
    {
        return $agent->id == $property->agent_id;
    }

    /**
     * Determine whether the user can delete the property.
     *
     * @param  \App\Models\Agent  $agent
     * @param  \App\Models\Property  $property
     * @return mixed
     */
    public function delete(Agent $agent, Property $property)
    {
        return $agent->id == $property->agent_id;
    }
}
