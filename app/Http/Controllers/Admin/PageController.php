<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\PageRepository;

use Illuminate\Http\Request;

use App\Http\Requests\Admin\Page\StoreRequest;
use App\Http\Requests\Admin\Page\UpdateRequest;

class PageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  PageRepository  $pages
     * @return void
     */
    public function __construct(
        PageRepository $pages
    ){
        $this->pages = $pages;
    }

    /**
     * Display a listing of pages.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Page.index')
            ->withPages($this->pages->orderby('heading')->get());
    }

    /**
     * Show the form for creating a new location.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Page.add');
    }

    /**
     * Store a newly created location in storage.
     *
     * @param  \App\Http\Requests\Admin\Page\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $page = $this->pages->create($request->all());
        if($page){
            return redirect()->route('admin.page.index')
                ->withSuccessMessage('Page is successfully added.');
        }
        return redirect()->back()->withInput()
            ->withWarningMessage('Page can not be added.');
    }


    /**
     * Display the specified page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('admin.Page.show')
            ->withPage($this->pages->find($id));
    }

    /**
     * Show the form for editing the specified page.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = $this->pages->find($id);
        return view('admin.Page.edit')
            ->withPage($page);
    }

    /**
     * Update the specified page in storage.
     *
     * @param  \App\Http\Requests\Admin\Page\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $page = $this->pages->update($id, $request->all());
        if($page){
            return redirect()->route('admin.page.index')
                ->withSuccessMessage('Page is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Page can not be updated.');
    }

    /**
     * Remove the specified location from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->pages->destroy($id);
        if($flag){
            return response()->json([
                'type'=>'success',
                'message'=>'Page is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Page can not deleted.',
        ], 422);
    }

    /**
     * Change status of the specified page from storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $page = $this->pages->changeStatus($request->id, 'is_active');
        if ($page) {
            return response()->json([
                'type' => 'success',
                'page' => $page,
                'message' => 'Status of selected page is changed successfully.'
            ], 200);
        }
        return response()->json([
            'type' => 'error',
            'message' => 'Status of selected page can not changed.',
        ], 422);
    }
}
