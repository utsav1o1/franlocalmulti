<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyImageRepository;
use App\Repositories\PropertyRepository;
use App\Http\Requests\Agent\Image\StoreRequest;

use Illuminate\Http\Request;

use Image;

class ImageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  PropertyRepository  $properties
     * @param  PropertyImageRepository  $images
     * @return void
     */
    public function __construct(
        PropertyRepository $properties,
        PropertyImageRepository $images
    ){
        $this->properties = $properties;
        $this->images = $images;
        $this->destinationpath = 'storage/properties/';
        $this->thumb_width = 484;
        $this->thumb_height = 363;
        $this->thumb_extension = '.jpg';
    }

    /**
     * Display a listing of the property images.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $property = $this->properties->find($id);
        $this->authorize('update', $property);
        return view('agent.Image.index')
            ->withProperty($property);
    }

    /**
     * Show the form for creating a new property.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $property = $this->properties->find($id);
        $this->authorize('update', $property);
        return view('agent.Image.add')
            ->withProperty($property);
    }

    /**
     * Store a newly created property in storage.
     *
     * @param  \App\Http\Requests\Agent\Image\StoreRequest  $request
     * @param init $id
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, $id)
    {
        $property = $this->properties->find($id);
        $this->authorize('update', $property);
        $data = $request->except('attachment');
        $imageFile = $request->attachment;
        if($imageFile) {
            $extension = strrchr($imageFile->getClientOriginalName(), '.');
            $new_file_name = "property_" . time();
            $attachment = $imageFile->move($this->destinationpath.$data['property_id'], $new_file_name.$extension);
            $data['attachment'] = isset($attachment) ? $new_file_name . $extension : NULL;

            $img = Image::make($this->destinationpath.$data['property_id'] .'/' . $data['attachment']);
            $height = $img->height();
            $width = $img->width();
            $thumb_height = $this->thumb_height;
            $thumb_width = $this->thumb_width;

            if($width > $height){
                $ratio = $width/$height;
                $thumb_width = $this->thumb_height * $ratio;
            } else {
                $ratio = $height/$width;
                $thumb_height = $this->thumb_width * $ratio;
            }

            $img->resize($thumb_width, $thumb_height, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $img->crop($this->thumb_width, $this->thumb_height);
            $new_file_name = "thumb_" . time();
            $thumbattachment = $img->save($this->destinationpath.$data['property_id'].'/'.$new_file_name . $this->thumb_extension);
            $data['thumb_attachment'] = isset($thumbattachment) ? $new_file_name . $this->thumb_extension : NULL;
        }
        $image = $this->images->create($data);

        if($image){
            return redirect()->route('agent.property.image.index', $image->property_id)
                ->withSuccessMessage('Property image is added successfully');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Property image can not be added.');
    }

    /**
     * Remove the specified property from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($propertyId, $id)
    {
        $property = $this->properties->find($propertyId);
        $this->authorize('delete', $property);
        $flag = $this->images->destroy($id);
        if($flag){
            return response()->json([
                'type'=>'success',
                'message'=>'Property image is successfully deleted.',
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Property image can not deleted.',
        ], 422);
    }

    /**
     * Make specified property image as cover from storage.
     *
     * @param  int  $propertyId
     * @param  int  $imageId
     * @return \Illuminate\Http\Response
     */
    public function makeCover($propertyId, $imageId)
    {
        $image = $this->images->makeCover($imageId);
        if($image){
            return response()->json([
                'type'=>'success',
                'image'=>$image,
                'message'=>'Selected image is made as cover successfully.',
            ], 200);
        }
        return response()->json([
            'type'=>'error',
            'message'=>'Selected image can not be made cover.',
        ], 422);
    }
}
