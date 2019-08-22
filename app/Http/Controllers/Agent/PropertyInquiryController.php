<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Repositories\PropertyInquiryRepository;
use App\Repositories\PropertyRepository;

use Illuminate\Http\Request;

class PropertyInquiryController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  PropertyRepository  $properties
     * @param  PropertyInquiryRepository  $inquiries
     * @return void
     */
    public function __construct(
        PropertyRepository $properties,
        PropertyInquiryRepository $inquiries
    ){
        $this->properties = $properties;
        $this->inquiries = $inquiries;
    }

    /**
     * Display a listing of the property.
     *
     * @param int $propertyId
     * @return \Illuminate\Http\Response
     */
    public function index($propertyId)
    {
        $property = $this->properties->find($propertyId);
        return view('agent.Property.inquiries')
            ->withProperty($property);
    }

    /**
     * Display a detail of the property inquiry.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('agent.Property.inquiry-show')
            ->withInquiry($this->inquiries->find($id));
    }
}
