
<div class="col-sm-3 col-md-3 list-group property-search-sidebar-container">
    <div class="wrapper">
        <p class="list-group-item side-bar-head property-search-sidebar-header">Search Property</p>
        <form action="{!! route('properties.search') !!}" method="get" class="form-group-lg">
            <div class="col-md-12 slide-category">
                <select class="form-control type" name="category">
                    <option value="">Select Category</option>
                    @foreach(DataHelper::getCategories() as $key=>$category)
                        <option value="{!! $category->id !!}">{!! $category->property_category !!}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-12 slider-loc">
                <input type="text" class="form-control" id="location" placeholder="Choose Location" />
                <input type='hidden' id='location_id' name="location_id" >
            </div>
            <div class="col-md-12">
                <select class="form-control property_type" name="property_type">
                    <option value="">Property Type</option>
                    @foreach(DataHelper::getPropertyTypes() as $key=>$type)
                        <option value="{!! $type->id !!}">{!! $type->property_type !!}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-12">
                <select class="form-control price_range" name="price_range">
                    <option value="">Price Range</option>
                    <option value="0-250000">Upto $250K</option>
                    <option value="250000-500000">$250K-$500K</option>
                    <option value="500000-650000">$500K-$650K</option>
                    <option value="650000-750000">$650K-$750K</option>
                    <option value="750000-1000000">$750K-$1M</option>
                    <option value="1000000-100000000000">$1M Over</option>
                </select>
            </div>
            <div class="col-md-12">
                <select class="form-control type" name="number_of_bedrooms">
                    <option value="" selected="selected">Beds</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4+</option>
                </select>
            </div>
            <div class="col-md-12">
                <select class="form-control type" name="number_of_bathrooms">
                    <option value="" selected="selected">Baths</option>

                    <option value="0">0</option>
                    <option value="1">1</option>
                     <option value="1">1.5</option>
                    <option value="2">2</option>
                     <option value="1">2.5</option>
                    <option value="3">3+</option>
                    
                </select>
            </div>

            <div class="col-md-12">
                <select class="form-control type" name="number_of_garages">
                    <option value="" selected="selected">Garage</option>
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3+</option>
                </select>
            </div>

            <div class="col-md-12">
                <button class="btn btn-primary">Search</button>
            </div>

        </form>

        <div class="clearfix"></div>
    </div>
</div>