<?php

namespace App\Http\Controllers;

use App\Http\Requests\PropertyInquiryRequest;
use App\Mail\PropertyInquirySent;
use App\Mail\PropertySent;
use App\Repositories\PropertyCategoryRepository;
use App\Repositories\PropertyInquiryRepository;
use App\Repositories\PropertyRepository;
use App\Repositories\PropertyTypeRepository;
use Auth;
use Carbon\Carbon;
use DataHelper;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sheets;

class PropertyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param PropertyTypeRepository $propertyTypes
     * @param PropertyCategoryRepository $categories
     * @param PropertyRepository $properties
     * @param PropertyInquiryRepository $inquiries
     * @return void
     */
    public function __construct(
        PropertyTypeRepository $propertyTypes,
        PropertyCategoryRepository $categories,
        PropertyRepository $properties,
        PropertyInquiryRepository $inquiries
    ) {
        $this->propertyTypes = $propertyTypes;
        $this->categories = $categories;
        $this->properties = $properties;
        $this->inquiries = $inquiries;
    }

    /**
     * Show the properties page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('properties')
            ->withProperties($this->properties->with(['coverImage', 'agent', 'location', 'contractType', 'propertyType'])->where('is_active', '1')->orderby('created_at', 'desc')->paginate(env('PAGINATE')));
    }

    /**
     * Show the properties search page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = \App\Models\Corporate\Property::leftJoin('property_images', 'property_images.id', '=', 'properties.main_image')

            ->leftJoin('property_agents', 'property_agents.property_id', '=', 'properties.id')
            ->leftJoin('price_types', 'price_types.id', '=', 'properties.price_type_id')
            ->leftJoin('locations', 'locations.id', '=', 'properties.location_id')
            ->leftJoin('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('is_active', 'Y')
            ->where('branch_id', env('BRANCH_ID'));

        if ($request->get('category')) {
            /**
             * filter only for sold and for leased properties only
             */
            $query->where('property_sub_category_id', (int) $request->get('category'))->where('is_leased_sold','N');
        }

        if ($request->get('property_type')) {
            $query->where('property_type_id', (int) $request->get('property_type'));
        }

        if ($request->get('location_id')) {
            $query->where('location_id', $request->get('location_id'));
        }

        if ($request->get('number_of_bedrooms')) {
            if ($request->get('number_of_bedrooms') == 4) {
                $query->where('number_of_bedrooms', '>=', $request->get('number_of_bedrooms'));
            } else {
                $query->where('number_of_bedrooms', $request->get('number_of_bedrooms'));
            }
        }

        if ($request->get('number_of_bathrooms')) {
            if ($request->get('number_of_bathrooms') == 4) {
                $query->where('number_of_bathrooms', '>=', $request->get('number_of_bathrooms'));
            } else {
                $query->where('number_of_bathrooms', $request->get('number_of_bathrooms'));
            }
        }
        if ($request->get('number_of_garages')) {
            if ($request->get('number_of_garages') == 3) {
                $query->where('number_of_garages', '>=', $request->get('number_of_garages'));
            } else {
                $query->where('number_of_garages', $request->get('number_of_garages'));
            }
        }

        if ($request->get('price_range')) {
            $range = explode('-', $request->get('price_range'));
            if (count($range) === count(array_filter($range, 'is_numeric'))) {

                $query->whereRaw("(properties.price_from IS NULL OR (properties.price_from >= {$range[0]} AND properties.price_from <= {$range[1]}))")
                    ->whereRaw("(properties.price_to IS NULL OR (properties.price_to >= {$range[0]} AND properties.price_to <= {$range[1]}))");
            }
        }

        $properties = $query->select('properties.*',
            DB::raw("COUNT(property_agents.id) AS agents_count"),
            'property_images.property_image',
            'price_types.name AS price_type_name',
            'property_types.name AS property_type_name',
            DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))
            ->groupBy('properties.id')
            ->orderby('created_at', 'desc')->paginate(env('PAGINATE'));

        return view('search-properties')
            ->withProperties($properties)
            ->withRequestData($request->all());
    }

    public function oldSearch()
    {
        $query = $this->properties->with(['coverImage', 'agent', 'location', 'contractType', 'propertyType'])
            ->where('is_active', '1');

        if ($request->get('category')) {
            $query->where('category_id', (int) $request->get('category'));
        }

        if ($request->get('property_type')) {
            $query->where('type_id', (int) $request->get('property_type'));
        }

        if ($request->get('location_id')) {
            $query->where('location_id', $request->get('location_id'));
        }

        if ($request->get('number_of_bedrooms')) {
            if ($request->get('number_of_bedrooms') == 4) {
                $query->where('number_of_bedrooms', '>=', $request->get('number_of_bedrooms'));
            } else {
                $query->where('number_of_bedrooms', $request->get('number_of_bedrooms'));
            }
        }

        if ($request->get('number_of_bathrooms')) {
            if ($request->get('number_of_bathrooms') == 4) {
                $query->where('number_of_bathrooms', '>=', $request->get('number_of_bathrooms'));
            } else {
                $query->where('number_of_bathrooms', $request->get('number_of_bathrooms'));
            }
        }
        if ($request->get('number_of_garages')) {
            if ($request->get('number_of_garages') == 3) {
                $query->where('number_of_garages', '>=', $request->get('number_of_garages'));
            } else {
                $query->where('number_of_garages', $request->get('number_of_garages'));
            }
        }

        if ($request->get('price_range')) {
            $range = explode('-', $request->get('price_range'));
            if (count($range) === count(array_filter($range, 'is_numeric'))) {
                $query->whereBetween('price', [$range[0], $range[1]]);
            }
        }

        $properties = $query->orderby('created_at', 'desc')->paginate(env('PAGINATE'));
        return view('search-properties')
            ->withProperties($properties)
            ->withRequestData($request->all());
    }

    /**
     * Show the buy properties page.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function buy(Request $request, $slug = null)
    {
        $propertySubCategory = [];

        $defaultCategories = \App\Models\Corporate\PropertyCategory::getDefaultPropertyCategories();

        $query = \App\Models\Corporate\Property::leftJoin('property_images', 'property_images.id', '=', 'properties.main_image')

            ->leftJoin('property_agents', 'property_agents.property_id', '=', 'properties.id')
            ->leftJoin('price_types', 'price_types.id', '=', 'properties.price_type_id')
            ->leftJoin('locations', 'locations.id', '=', 'properties.location_id')
            ->leftJoin('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('is_active', 'Y')
            ->where('is_leased_sold', 'N')
            ->where('branch_id', env('BRANCH_ID'))
            ->where('property_category_id', $defaultCategories['buy']);

        if ($slug) {
            $propertySubCategory = \App\Models\Corporate\PropertySubCategory::where('slug', $slug)->first();

            if ($propertySubCategory) {
                $query->where('property_sub_category_id', $propertySubCategory->id);
            }

        }

        if ($request->get('property_type')) {
            $query->where('property_type_id', (int) $request->get('property_type'));
        }

        if ($request->get('location_id')) {
            $query->where('location_id', $request->get('location_id'));
        }

        if ($request->get('number_of_bedrooms')) {
            if ($request->get('number_of_bedrooms') == 4) {
                $query->where('number_of_bedrooms', '>=', $request->get('number_of_bedrooms'));
            } else {
                $query->where('number_of_bedrooms', $request->get('number_of_bedrooms'));
            }
        }

        if ($request->get('number_of_bathrooms')) {
            if ($request->get('number_of_bathrooms') == 4) {
                $query->where('number_of_bathrooms', '>=', $request->get('number_of_bathrooms'));
            } else {
                $query->where('number_of_bathrooms', $request->get('number_of_bathrooms'));
            }
        }
        if ($request->get('number_of_garages')) {
            if ($request->get('number_of_garages') == 3) {
                $query->where('number_of_garages', '>=', $request->get('number_of_garages'));
            } else {
                $query->where('number_of_garages', $request->get('number_of_garages'));
            }
        }

        if ($request->get('price_range')) {
            $range = explode('-', $request->get('price_range'));
            if (count($range) === count(array_filter($range, 'is_numeric'))) {

                $query->whereRaw("(properties.price_from IS NULL OR (properties.price_from >= {$range[0]} AND properties.price_from <= {$range[1]}))")
                    ->whereRaw("(properties.price_to IS NULL OR (properties.price_to >= {$range[0]} AND properties.price_to <= {$range[1]}))");
            }
        }

        $properties = $query->select('properties.*',
            DB::raw("COUNT(property_agents.id) AS agents_count"),
            'property_images.property_image',
            'price_types.name AS price_type_name',
            'property_types.name AS property_type_name',
            DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))
            ->groupBy('properties.id')
            ->orderby('created_at', 'desc')->paginate(env('PAGINATE'));

        return view('buy')
            ->withSlug($slug)
            ->withCategory($propertySubCategory)
            ->withProperties($properties)
            ->withRequestData($request->all())
            ->withCategories(DataHelper::getPropertySubCategoriesOrderByName('buy'))
            ->withPropertyTypes(\App\Models\Corporate\PropertyType::pluck('name AS property_type', 'id'));
    }

    public function oldBuy()
    {
        $category = [];
        $query = $this->properties->with(['coverImage', 'agent', 'location', 'contractType', 'propertyType'])
            ->where('is_active', '1')
            ->where('is_rent', '0');

        if ($slug) {
            $category = $this->categories->findByField('slug', $slug);
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($request->get('property_type')) {
            $query->where('type_id', (int) $request->get('property_type'));
        }

        if ($request->get('location_id')) {
            $query->where('location_id', $request->get('location_id'));
        }

        if ($request->get('number_of_bedrooms')) {
            if ($request->get('number_of_bedrooms') == 4) {
                $query->where('number_of_bedrooms', '>=', $request->get('number_of_bedrooms'));
            } else {
                $query->where('number_of_bedrooms', $request->get('number_of_bedrooms'));
            }
        }

        if ($request->get('number_of_bathrooms')) {
            if ($request->get('number_of_bathrooms') == 4) {
                $query->where('number_of_bathrooms', '>=', $request->get('number_of_bathrooms'));
            } else {
                $query->where('number_of_bathrooms', $request->get('number_of_bathrooms'));
            }
        }
        if ($request->get('number_of_garages')) {
            if ($request->get('number_of_garages') == 3) {
                $query->where('number_of_garages', '>=', $request->get('number_of_garages'));
            } else {
                $query->where('number_of_garages', $request->get('number_of_garages'));
            }
        }

        if ($request->get('price_range')) {
            $range = explode('-', $request->get('price_range'));
            if (count($range) === count(array_filter($range, 'is_numeric'))) {
                $query->whereBetween('price', [$range[0], $range[1]]);
            }
        }

        $properties = $query->orderby('created_at', 'desc')->paginate(env('PAGINATE'));
        return view('buy')
            ->withSlug($slug)
            ->withCategory($category)
            ->withProperties($properties)
            ->withRequestData($request->all())
            ->withCategories($this->categories->orderby('order_position', 'asc')->get())
            ->withPropertyTypes($this->propertyTypes->orderby('order_position', 'asc')->pluck('property_type', 'id'));
    }

    /**
     * Show the rent properties page.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function rent(Request $request, $slug = null)
    {
        $propertySubCategory = [];

        $defaultCategories = \App\Models\Corporate\PropertyCategory::getDefaultPropertyCategories();

        $query = \App\Models\Corporate\Property::leftJoin('property_images', 'property_images.id', '=', 'properties.main_image')

            ->leftJoin('property_agents', 'property_agents.property_id', '=', 'properties.id')
            ->leftJoin('price_types', 'price_types.id', '=', 'properties.price_type_id')
            ->leftJoin('locations', 'locations.id', '=', 'properties.location_id')
            ->leftJoin('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('is_active', 'Y')
            ->where('is_leased_sold', 'N')
            ->where('branch_id', env('BRANCH_ID'))
            ->where('property_category_id', $defaultCategories['rent']);

        if ($slug) {
            $propertySubCategory = \App\Models\Corporate\PropertySubCategory::where('slug', $slug)->first();

            if ($propertySubCategory) {
                $query->where('property_sub_category_id', $propertySubCategory->id);
            }

        }

        if ($request->get('property_type')) {
            $query->where('property_type_id', (int) $request->get('property_type'));
        }

        if ($request->get('location_id')) {
            $query->where('location_id', $request->get('location_id'));
        }

        if ($request->get('number_of_bedrooms')) {
            if ($request->get('number_of_bedrooms') == 4) {
                $query->where('number_of_bedrooms', '>=', $request->get('number_of_bedrooms'));
            } else {
                $query->where('number_of_bedrooms', $request->get('number_of_bedrooms'));
            }
        }

        if ($request->get('number_of_bathrooms')) {
            if ($request->get('number_of_bathrooms') == 4) {
                $query->where('number_of_bathrooms', '>=', $request->get('number_of_bathrooms'));
            } else {
                $query->where('number_of_bathrooms', $request->get('number_of_bathrooms'));
            }
        }
        if ($request->get('number_of_garages')) {
            if ($request->get('number_of_garages') == 3) {
                $query->where('number_of_garages', '>=', $request->get('number_of_garages'));
            } else {
                $query->where('number_of_garages', $request->get('number_of_garages'));
            }
        }

        if ($request->get('price_range')) {
            $range = explode('-', $request->get('price_range'));
            if (count($range) === count(array_filter($range, 'is_numeric'))) {

                $query->whereRaw("(properties.price_from IS NULL OR (properties.price_from >= {$range[0]} AND properties.price_from <= {$range[1]}))")
                    ->whereRaw("(properties.price_to IS NULL OR (properties.price_to >= {$range[0]} AND properties.price_to <= {$range[1]}))");
            }
        }

        $properties = $query->select('properties.*',
            DB::raw("COUNT(property_agents.id) AS agents_count"),
            'property_images.property_image',
            'price_types.name AS price_type_name',
            'property_types.name AS property_type_name',
            DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))
            ->groupBy('properties.id')
            ->orderby('created_at', 'desc')->paginate(env('PAGINATE'));

        return view('rent')
            ->withSlug($slug)
            ->withCategory($propertySubCategory)
            ->withProperties($properties)
            ->withRequestData($request->all())
            ->withCategories(DataHelper::getPropertySubCategoriesOrderByName('rent'))
            ->withPropertyTypes(\App\Models\Corporate\PropertyType::pluck('name AS property_type', 'id'));

    }

    public function leasedProperties()
    {
        $defaultCategories = \App\Models\Corporate\PropertyCategory::getDefaultPropertyCategories();

        $query = \App\Models\Corporate\Property::leftJoin('property_images', 'property_images.id', '=', 'properties.main_image')

            ->leftJoin('property_agents', 'property_agents.property_id', '=', 'properties.id')
            ->leftJoin('price_types', 'price_types.id', '=', 'properties.price_type_id')
            ->leftJoin('locations', 'locations.id', '=', 'properties.location_id')
            ->leftJoin('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('is_active', 'Y')
            ->where('is_leased_sold', 'Y')
            ->where('branch_id', env('BRANCH_ID'))
            ->where('property_category_id', $defaultCategories['rent']);

        $properties = $query->select('properties.*',
            DB::raw("COUNT(property_agents.id) AS agents_count"),
            'property_images.property_image',
            'price_types.name AS price_type_name',
            'property_types.name AS property_type_name',
            DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))
            ->groupBy('properties.id')
            ->orderby('created_at', 'desc')->paginate(env('PAGINATE'));

        return view('leased-properties')
            ->withProperties($properties)
            ->withCategories(DataHelper::getPropertySubCategoriesOrderByName('rent'))
            ->withPropertyTypes(\App\Models\Corporate\PropertyType::pluck('name AS property_type', 'id'));
    }

    public function oldRent()
    {
        $category = [];
        $query = $this->properties->with(['coverImage', 'agent', 'location', 'contractType', 'propertyType'])
            ->where('is_active', '1')
            ->where('is_rent', '1');
        if ($slug) {
            $category = $this->categories->findByField('slug', $slug);
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        if ($request->get('property_type')) {
            $query->where('type_id', (int) $request->get('property_type'));
        }

        if ($request->get('location_id')) {
            $query->where('location_id', $request->get('location_id'));
        }

        if ($request->get('number_of_bedrooms')) {
            if ($request->get('number_of_bedrooms') == 4) {
                $query->where('number_of_bedrooms', '>=', $request->get('number_of_bedrooms'));
            } else {
                $query->where('number_of_bedrooms', $request->get('number_of_bedrooms'));
            }
        }

        if ($request->get('number_of_bathrooms')) {
            if ($request->get('number_of_bathrooms') == 4) {
                $query->where('number_of_bathrooms', '>=', $request->get('number_of_bathrooms'));
            } else {
                $query->where('number_of_bathrooms', $request->get('number_of_bathrooms'));
            }
        }
        if ($request->get('number_of_garages')) {
            if ($request->get('number_of_garages') == 3) {
                $query->where('number_of_garages', '>=', $request->get('number_of_garages'));
            } else {
                $query->where('number_of_garages', $request->get('number_of_garages'));
            }
        }

        if ($request->get('price_range')) {
            $range = explode('-', $request->get('price_range'));
            if (count($range) === count(array_filter($range, 'is_numeric'))) {
                $query->whereBetween('price', [$range[0], $range[1]]);
            }
        }
        $properties = $query->orderby('created_at', 'desc')->paginate(env('PAGINATE'));

        return view('rent')
            ->withSlug($slug)
            ->withCategory($category)
            ->withProperties($properties)
            ->withRequestData($request->all())
            ->withPropertyTypes($this->propertyTypes->orderby('order_position', 'asc')->pluck('property_type', 'id'));
    }

    /**
     * Show the properties detail page.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {

        $user = [];
        $userProperties = [];
        $property = \App\Models\Corporate\Property::leftJoin('property_images', 'property_images.id', '=', 'properties.main_image')

            ->leftJoin('property_agents', 'property_agents.property_id', '=', 'properties.id')
            ->leftJoin('price_types', 'price_types.id', '=', 'properties.price_type_id')
            ->leftJoin('locations', 'locations.id', '=', 'properties.location_id')
            ->leftJoin('property_types', 'property_types.id', '=', 'properties.property_type_id')
            ->where('properties.slug', $slug)
            ->where('branch_id', env('BRANCH_ID'))
            ->select('properties.*',
                DB::raw("COUNT(property_agents.id) AS agents_count"),
                'property_images.property_image',
                'price_types.name AS price_type_name',
                'property_types.name AS property_type_name',
                DB::raw("CONCAT(locations.suburb) AS location_short_name"),
                DB::raw("CONCAT(locations.suburb, ' ', CONCAT(locations.state, ' ', locations.postal_code)) AS location_name"))
            ->groupBY('properties.id')
            ->first();

        if ($property) {
            if (Auth::guard('user')->check()) {
                $user = auth()->guard('user')->user();
                $userProperties = $user->properties()->pluck('id')->toArray();
                $existFlag = in_array($property->id, $userProperties);
            }
            $property->incrementViewCount();
            return view('property-detail')
                ->withProperty($property)
                ->withUser($user)
                ->withExistFlag($existFlag)
                ->withRecentProperties(\App\Models\Corporate\Property::where('is_active', '=', 'Y')->where('branch_id', env('BRANCH_ID'))->orderby('created_at', 'desc')->take(5)->get())
                ->withSavedProperties(\App\Models\Corporate\Property::where('is_active', '=', 'Y')->where('branch_id', env('BRANCH_ID'))->whereIn('id', $userProperties)->orderby('created_at', 'desc')->take(5)->get())
                ->withSimilarProperties(\App\Models\Corporate\Property::where('is_active', '=', 'Y')->where('branch_id', env('BRANCH_ID'))->where('property_sub_category_id', $property->property_sub_category_id)->orderby('created_at', 'desc')->take(5)->get())
                ->withPopularProperties(\App\Models\Corporate\Property::where('is_active', '=', 'Y')->where('branch_id', env('BRANCH_ID'))->orderby('view_count', 'desc')->take(5)->get());

        } else {
            return view('404');
        }
    }

    /**
     * Show the properties detail page.
     *
     * @param \App\Http\Requests\PropertyInquiryRequest $request
     * @return \Illuminate\Http\Response
     */
    public function submitContact(PropertyInquiryRequest $request)
    {

        $data = $request->all();
        $inquiry = $this->inquiries->create($request->all());

        if ($inquiry) {
            if ($inquiry->property) {

                $agents = $inquiry->property->getPropertyAgents();

                $emails = [];

                foreach ($agents as $agent) {
                    $emails[] = $agent->email;
                }

                Mail::to($emails)
                    ->send(new PropertyInquirySent($inquiry));

                $appendData = [
                    $data['full_name'],
                    $data['email_address'],
                    $data['phone_number'],
                    '',
                    '',
                    '',
                    $data['message'],
                    Carbon::parse(Carbon::now())->format('M d, Y'),

                ];

                $values = Sheets::spreadsheet(env('GOOGLE_SPREADSHEET_ID'))->sheetById(env('GOOGLE_SHEET_ID'))->append([$appendData]);

            }
            return redirect()->back()
                ->withSuccessMessage('Your inquiry is submitted successfully.');
        }

        return redirect()->back()
            ->withInput()
            ->withWarningMessage('Your inquiry can not be submitted.');
    }

    /**
     * Show the properties detail page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function save(Request $request)
    {
        if (Auth::guard('user')->check()) {
            $property = $this->properties->find($request->property_id);
            if ($property) {
                $user = auth()->guard('user')->user();
                $user->properties()->syncWithoutDetaching([$property->id]);
                return response()->json(['status' => 'success',
                    'message' => 'Property is saved successfully.',
                ], 200);
            }
            return response()->json(['status' => 'error',
                'message' => 'Property does not exist.',
            ], 404);
        } else {
            return response()->json(['status' => 'error',
                'message' => 'Please login before saving properties.',
            ], 401);
        }
    }

    /**
     * print the property detail page.
     *
     * @param string $slug
     * @return \Illuminate\Http\Response
     */
    public function printProperty($slug)
    {
        $property = $this->properties->findByField('slug', $slug);
        if ($property) {
            return view('property-print')
                ->withProperty($property);
        } else {
            return view('404');
        }
    }

    /**
     * send email the property detail page.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sendEmail(Request $request)
    {
        $property = \App\Models\Corporate\Property::find($request->property_id);
        if ($property) {
            Mail::to($request->input('email_address'))
                ->send(new PropertySent($property));
            return response()->json(['status' => 'ok',
                'message' => 'Property detail is sent to submitted email address.'], 200);
        }

        if ($request->isJson()) {
            return response()->json(['status' => 'error',
                'message' => 'Property detail can not be sent to submitted email address.'], 422);
        }

        return redirect()->back()
            ->withWarningMessage('Property detail can not be sent to submitted email address.');
    }
}
