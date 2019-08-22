<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\LocationRepository;
use App\Http\Requests\Admin\Location\StoreRequest;
use App\Http\Requests\Admin\Location\UpdateRequest;

use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  LocationRepository  $locations
     * @return void
     */
    public function __construct(
        LocationRepository $locations
    ){
        $this->locations = $locations;
    }

    /**
     * Display a listing of the location.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Location.index')
            ->withLocations($this->locations->orderby('location_name')->get());
    }

    /**
     * Show the form for creating a new location.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created location in storage.
     *
     * @param  \App\Http\Requests\Admin\Location\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $location = $this->locations->create($request->all());
        if($location){
            return response()->json(['type' => 'success',
                'location' => $location,
                'message' => 'Location is successfully added.'], 200);
        }
        return response()->json(['type'=>'error',
            'message'=>'Location can not be added.'], 422);
    }

    /**
     * Display the specified location.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $location = $this->locations->find($id);
        return response()->json(['status'=>'ok',
            'location'=>$location], 200);
    }

    /**
     * Show the form for editing the specified location.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified location in storage.
     *
     * @param  \App\Http\Requests\Admin\Location\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $location = $this->locations->update($request->id, $request->except('id'));
        if($location){
            return response()->json(['type' => 'success',
                'location' => $location,
                'message' => 'Location is successfully updated.'], 200);
        }
        return response()->json(['type'=>'error',
            'message'=>'Location can not be updated.'], 422);
    }

    /**
     * Remove the specified location from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->locations->destroy($id);
        if($flag){
            return response()->json([
                'type'=>'success',
                'message'=>'Location is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Location can not deleted.',
        ], 422);
    }
}
