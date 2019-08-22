<?php

namespace App\Http\Controllers\Agent;

use App\Models\PriceType;
use App\Http\Controllers\Controller;
use App\Repositories\ContractTypeRepository;
use App\Repositories\LocationRepository;
use App\Repositories\PriceTypeRepository;
use App\Repositories\PropertyCategoryRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\ProjectRepository;
use App\Http\Requests\Agent\Property\StoreRequest;
use App\Http\Requests\Agent\Property\UpdateRequest;

use App\Repositories\PropertyTypeRepository;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  PropertyRepository  $properties
     * @param  PropertyTypeRepository  $types
     * @param  PropertyCategoryRepository  $categories
     * @param  ContractTypeRepository  $contractTypes
     * @param  PriceTypeRepository  $priceTypes
     * @param  LocationRepository  $locations
     * @return void
     */
    public function __construct(
        PropertyRepository $properties,
        PropertyTypeRepository $types,
        PropertyCategoryRepository $categories,
        ContractTypeRepository $contractTypes,
        PriceTypeRepository $priceTypes,
        LocationRepository $locations,
        ProjectRepository $projectRepo
    ){
        $this->properties = $properties;
        $this->types = $types;
        $this->categories = $categories;
        $this->contractTypes = $contractTypes;
        $this->priceTypes = $priceTypes;
        $this->locations = $locations;
        $this->projectRepo = $projectRepo;
        $this->destinationpath = 'storage/properties/';
    }

    /**
     * Display a listing of the property.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agent.Property.index')
            ->withProperties($this->properties->where('agent_id', '=',auth()->guard('agent')->user()->id)
                ->orderby('property_name')->get());
    }

    /**
     * Show the form for creating a new property.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.Property.add')
            ->withTypes($this->types->all())
            ->withCategories($this->categories->all())
            ->withLocations($this->locations->pluck('location_name', 'id'))
            ->withContractTypes($this->contractTypes->pluck('heading', 'id'))
            ->withProjects($this->projectRepo->getProjectsForSelect())
            ->withPriceTypes($this->priceTypes->pluck('heading', 'id'));
    }

    /**
     * Store a newly created property in storage.
     *
     * @param  \App\Http\Requests\Agent\Property\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $defaultPriceTypes = PriceType::getDefaultPriceTypes();

        $data = $request->except('floor_plan');
        $data['agent_id'] = auth()->guard('agent')->user()->id;
        $data['zoom'] = 11;

        if($data['price_type_id'] != $defaultPriceTypes['priceGuide'])
        {
            $data['price_to'] = null;
        }

        if($data['project_id'] == 0)
            $data['project_id'] = null;

        $property = $this->properties->create($data);
        
        if($property){
            mkdir($this->destinationpath.$property->id, 0777);
            $imageFile = $request->floor_plan;
            if($imageFile) {
                $extension = strrchr($imageFile->getClientOriginalName(), '.');
                $new_file_name = "floor_plan_" . time();
                $attachment = $imageFile->move($this->destinationpath.$property->id, $new_file_name.$extension);
                $data['floor_plan'] = isset($attachment) ? $new_file_name . $extension : NULL;
                $this->properties->update($property->id, $data);
            }
            return redirect()->route('agent.property.index')
                ->withSuccessMessage('Property is added successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Property can not be added.');
    }

    /**
     * Display the specified property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = $this->properties->find($id);

        return response()->json(['status'=>'ok',
            'property'=>$property], 200);
    }

    /**
     * Show the form for editing the specified property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $property = $this->properties->find($id);
        $this->authorize('update', $property);
        return view('agent.Property.edit')
            ->withProperty($property)
            ->withTypes($this->types->all())
            ->withCategories($this->categories->all())
            ->withLocations($this->locations->pluck('location_name', 'id'))
            ->withContractTypes($this->contractTypes->pluck('heading', 'id'))
            ->withProjects($this->projectRepo->getProjectsForSelect())
            ->withPriceTypes($this->priceTypes->pluck('heading', 'id'));
    }

    /**
     * Update the specified property in storage.
     *
     * @param  \App\Http\Requests\Agent\Property\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $defaultPriceTypes = PriceType::getDefaultPriceTypes();

        $property = $this->properties->find($id);
        $this->authorize('update', $property);
        $data = $request->except('floor_plan');
        $data['price'] = $data['price'] ? : 0;
        $data['zoom'] = 11;

        if($data['price_type_id'] != $defaultPriceTypes['priceGuide'])
        {
            $data['price_to'] = null;
        }
        
        if($data['project_id'] == 0)
            $data['project_id'] = null;
        
        $imageFile = $request->floor_plan;
        if($imageFile) {
            if(file_exists('storage/properties/'.$property->id .'/'.$property->floor_plan) && $property->floor_plan!=''){
                unlink('storage/properties/'.$property->id .'/'.$property->floor_plan);
            }
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "floor_plan_" . time();
            $attachment = $imageFile->move($this->destinationpath.$property->id, $new_file_name.$extension);
            $data['floor_plan'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }
        $property = $this->properties->update($id, $data);
        if($property){
            return redirect()->route('agent.property.index')
                ->withSuccessMessage('Property is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Property can not be updated.');
    }

    /**
     * Remove the specified property from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = $this->properties->find($id);
        $this->authorize('delete', $property);

        $flag = $this->properties->destroy($id);
        if($flag){
            return response()->json([
                'type'=>'success',
                'message'=>'Property is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Property can not deleted.',
        ], 422);
    }
}
