<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyCategoryRepository;
use App\Requests\Admin\PropertyCategory\StoreRequest;
use App\Requests\Admin\PropertyCategory\UpdateRequest;

use Illuminate\Http\Request;

class PropertyCategoryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  PropertyCategoryRepository  $categories
     * @return void
     */
    public function __construct(
        PropertyCategoryRepository $categories
    ){
        $this->categories = $categories;
    }

    /**
     * Display a listing of the property category.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.PropertyCategory.index')
            ->withPropertyCategories($this->categories->orderby('order_position', 'asc')->get());
    }

    /**
     * Show the form for creating a new property category.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created property category in storage.
     *
     * @param  \App\Requests\Admin\PropertyCategory\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $category = $this->categories->create($request->all());
        if($category){
            return response()->json(['status' => 'ok',
                'propertyCategory' => $category, 'message' => 'Property category is successfully added.'], 200);
        }
        return response()->json(['status'=>'error',
            'message'=>'Property category can not be added.'], 422);
    }

    /**
     * Display the specified property category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = $this->categories->find($id);
        return response()->json(['status'=>'ok','propertyCategory'=>$category], 200);
    }

    /**
     * Show the form for editing the specified property category.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified property category in storage.
     *
     * @param  \App\Requests\Admin\PropertyCategory\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $category = $this->categories->update($request->id, $request->except('id'));
        if($category){
            return response()->json(['status' => 'ok',
                'propertyCategory' => $category,
                'message' => 'Property category is successfully updated.'], 200);
        }
        return response()->json(['status'=>'error',
            'message'=>'Property category can not be updated.'], 422);
    }

    /**
     * Remove the specified property category from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->categories->destroy($id);
        if($flag){
            return response()->json([
                'category'=>'success',
                'message'=>'Property category is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'category'=>'error',
            'message'=>'Property category can not deleted.',
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
        $categories = explode('&', str_replace('row[]=', '', $request->categories));
        $position = 1;
        foreach ($categories as $categoryId) {
            $this->categories->update($categoryId, ['order_position'=>$position]);
            $position++;
        }
        return response()->json(['status' => 'success', 'message' => 'Your categories are sorted successfully.'], 200);
    }
}
