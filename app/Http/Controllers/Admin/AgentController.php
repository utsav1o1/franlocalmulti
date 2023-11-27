<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\FranchiseAgentRepository;
use App\Http\Requests\Admin\Agent\StoreRequest;
use App\Http\Requests\Admin\Agent\UpdateRequest;

use App\Repositories\LocationRepository;
use App\Repositories\DesignationRepository;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  LocationRepository  $locations
     * @param  DesignationRepository  $designations
     * @param  AgentRepository  $agents
     * @return void
     */
    public function __construct(
        LocationRepository $locations,
        DesignationRepository $designations,
        FranchiseAgentRepository $agents
    ){
        $this->locations = $locations;
        $this->designations = $designations;
        $this->agents = $agents;
        $this->destinationpath = 'storage/agents/';
    }

    /**
     * Display a listing of the agent.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Agent.index')
            ->withAgents($this->agents->with(['location', 'designation'])->orderby('order_position', 'asc')->get());
    }

    /**
     * Show the form for creating a new agent.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Agent.add')
            ->withLocations($this->locations->pluck('location_name', 'id'))
            ->withDesignations($this->designations->pluck('designation', 'id'));
    }

    /**
     * Store a newly created agent in storage.
     *
     * @param  \App\Http\Requests\Admin\Agent\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('attachment', 'password');
        $data['password'] = bcrypt($request->get('password'));
        $imageFile = $request->attachment;
        if($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "agent_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $agent = $this->agents->create($data);

        if($agent){
            return redirect()->route('admin.agent.index')
                ->withSuccessMessage('Agent is added successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Agent can not be added.');
    }

    /**
     * Display the specified agent.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = $this->agents->find($id);
        return response()->json(['status'=>'ok','agent'=>$agent], 200);
    }

    /**
     * Show the form for editing the specified agent.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.Agent.edit')
            ->withAgent($this->agents->find($id))
            ->withLocations($this->locations->pluck('location_name', 'id'))
            ->withDesignations($this->designations->pluck('designation', 'id'));
    }

    /**
     * Update the specified agent in storage.
     *
     * @param  \App\Http\Requests\Admin\Agent\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $agent = $this->agents->find($id);

        $imageFile = $request->attachment;
        if($imageFile) {
            if (file_exists($this->destinationpath . $agent->attachment) && $agent->attachment != '') {
                unlink($this->destinationpath . $agent->attachment);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "agent_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $agent = $this->agents->update($id, $data);

        if($agent){
            return redirect()->route('admin.agent.index')
                ->withSuccessMessage('Agent is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Agent can not be updated.');
    }

    /**
     * Remove the specified agent from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->agents->destroy($id);
        if($flag){
            return response()->json([
                'type'=>'success',
                'message'=>'Agent is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Agent can not deleted.',
        ], 422);
    }

    /**
     * sort orders of the specified resource from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sortOrder(Request $request)
    {
        $agents = explode('&', str_replace('row[]=', '', $request->agents));
        $position = 1;
        foreach ($agents as $agentId) {
            $this->agents->update($agentId, ['order_position'=>$position]);
            $position++;
        }
        return response()->json(['status' => 'success', 'message' => 'Your agents are sorted successfully.'], 200);
    }
}
