<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyRepository;

use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  PropertyRepository  $properties
     * @return void
     */
    public function __construct(
        PropertyRepository $properties
    ){
        $this->properties = $properties;
    }

    /**
     * Display a listing of properties.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Property.index')
            ->withProperties($this->properties->with(['agent','propertyType'])->orderby('created_at')->get());
    }

    /**
     * Display the specified property.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.Property.show')
            ->withProperty($this->properties->find($id));
    }

    /**
     * Change status of the specified property from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $property = $this->properties->changeStatus($request->id, 'is_active');
        if ($property) {
            return response()->json([
                'type' => 'success',
                'property' => $property,
                'message' => 'Status of selected property is changed successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Status of selected property can not changed.',
        ], 422);
    }
}
