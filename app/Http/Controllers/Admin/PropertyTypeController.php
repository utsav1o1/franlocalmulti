<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyTypeRepository;
use App\Http\Requests\Admin\PropertyType\StoreRequest;
use App\Http\Requests\Admin\PropertyType\UpdateRequest;

use Illuminate\Http\Request;

class PropertyTypeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  PropertyTypeRepository  $types
     * @return void
     */
    public function __construct(
        PropertyTypeRepository $types
    ){
        $this->types = $types;
    }

    /**
     * Display a listing of the property type.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.PropertyType.index')
            ->withPropertyTypes($this->types->orderby('order_position', 'asc')->get());
    }

    /**
     * Show the form for creating a new property type.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created property type in storage.
     *
     * @param  \App\Http\Requests\Admin\PropertyType\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $type = $this->types->create($request->all());
        if($type){
            return response()->json(['status' => 'ok',
                'propertyType' => $type, 'message' => 'Property type is successfully added.'], 200);
        }
        return response()->json(['status'=>'error',
            'message'=>'Property type can not be added.'], 422);
    }

    /**
     * Display the specified property type.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $type = $this->types->find($id);
        return response()->json(['status'=>'ok','propertyType'=>$type], 200);
    }

    /**
     * Show the form for editing the specified property type.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified property type in storage.
     *
     * @param  \App\Http\Requests\Admin\PropertyType\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $type = $this->types->update($request->id, $request->except('id'));
        if($type){
            return response()->json(['status' => 'ok',
                'propertyType' => $type,
                'message' => 'Property type is successfully updated.'], 200);
        }
        return response()->json(['status'=>'error',
            'message'=>'Property type can not be updated.'], 422);
    }

    /**
     * Remove the specified property type from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->types->destroy($id);
        if($flag){
            return response()->json([
                'type'=>'success',
                'message'=>'Property type is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Property type can not deleted.',
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
        $types = explode('&', str_replace('row[]=', '', $request->types));
        $position = 1;
        foreach ($types as $typeId) {
            $this->types->update($typeId, ['order_position'=>$position]);
            $position++;
        }
        return response()->json(['status' => 'success', 'message' => 'Your types are sorted successfully.'], 200);
    }
}
