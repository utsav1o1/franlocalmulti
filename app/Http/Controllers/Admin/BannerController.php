<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\BannerRepository;

use Illuminate\Http\Request;

use App\Http\Requests\Admin\Banner\StoreRequest;
use App\Http\Requests\Admin\Banner\UpdateRequest;

class BannerController extends Controller
{
    /**
     * The banners repository instance.
     *
     * @var BannerRepository
     */
    protected $banners;

    /**
     * Create a new controller instance.
     *
     * @param  BannerRepository  $banners
     * @return void
     */
    public function __construct(
        BannerRepository $banners
    ){
        $this->banners = $banners;
        $this->destinationpath = 'storage/banners/';
    }

    /**
     * Display a listing of the banner.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Banner.index')
            ->withBanners($this->banners->all());
    }

    /**
     * Show the form for creating a new banner.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Banner.add');
    }

    /**
     * Store a newly created banner in storage.
     *
     * @param  \App\Modules\Gallery\Requests\Banner\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $data = $request->except('attachment');
        $imageFile = $request->attachment;

        if($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "banner_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $banner = $this->banners->create($data);

        if($banner){
            return redirect()->route('banner.index')
                ->withSuccessMessage('Banner is added successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Banner can not be added.');
    }

    /**
     * Display the specified banner.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified banner.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('admin.Banner.edit')
            ->withBanner($this->banners->find($id));
    }

    /**
     * Update the specified banner in storage.
     *
     * @param  \App\Modules\Gallery\Requests\Banner\UpdateRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = $request->except('attachment');
        $imageFile = $request->attachment;

        if($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "banner_" . time();
            $attachment = $imageFile->move($this->destinationpath, $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;
        }

        $banner = $this->banners->update($id, $data);

        if($banner){
            return redirect()->route('banner.index')
                ->withSuccessMessage('Banner is updated successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Banner can not be updated.');
    }

    /**
     * Remove the specified banner from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $flag = $this->banners->destroy($id);
        if($flag){
            return response()->json([
                'type'=>'success',
                'message'=>'Banner is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Banner can not deleted.',
        ], 422);
    }

    /**
     * Change status of the specified banner from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request)
    {
        $banner = $this->banners->changeStatus($request->id);
        if($banner){
            return response()->json([
                'type'=>'success',
                'banner'=>$banner,
                'message'=>'Status of selected banner is changed successfully.'
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Status of selected banner can not changed.',
        ], 422);
    }
}
