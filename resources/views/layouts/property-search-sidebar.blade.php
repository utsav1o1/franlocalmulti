<div class="col-sm-3 col-md-3 list-group property-search-sidebar-container">
    <div class="wrapper">
        <p class="list-group-item side-bar-head property-search-sidebar-header">Search Property</p>
        <form action="{!! route('properties.search') !!}" method="get" class="form-group-lg">
            <div class="col-md-12 slide-category">
                <select class="form-control type" name="category">
                    <option value="">Select Category</option>
                    <option value="1">Buy - Residential</option>
                            <option value="2">Buy - House & Land</option>
                            <option value="3">Buy - Land</option>
                            <option value="4">Buy - Commercial</option>
                            <option value="5">Buy - Rural</option>
                            <option value="6">Rent - Residential</option>
                            <option value="7">Rent - Commercial</option>
                            <option value="8">Rent - Rental</option>
                            <option value="9">Rent - Holiday Rental</option>

                </select>
            </div>
            <div class="col-md-12 slider-loc">
                <input type="text" class="form-control" id="location" placeholder="Choose Location" />
                <input type='hidden' id='location_id' name="location_id">
            </div>
            <div class="col-md-12">
                <select class="form-control property_type" name="property_type">
                            <option value="">Property Type</option>
                            <option value="1">Duplex</option>
                            <option value="2">Terrace</option>
                            <option value="3">Studio</option>
                            <option value="4">Townhouse</option>
                            <option value="5">Unit</option>
                            <option value="6">House</option>
                            <option value="7">House & Land</option>
                            <option value="8">Land</option>
                            <option value="9">Villa</option>
                            <option value="10">Acreage</option>
                            <option value="11">Serviced Apartment</option>
                            <option value="12">Apartment</option>
                            <option value="13">Others</option>
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
