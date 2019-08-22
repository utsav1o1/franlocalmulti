
    <div class="col-md-2 inner-col-md-2">
        <select class="form-control type" name="property_type">
            <option value="">All Property Types</option>
            @foreach($propertyTypes as $id=>$type)
                <option value="{!! $id !!}"
                        @if(!empty($requestData['property_type'])) @if($id == $requestData['property_type']) selected="selected"@endif @endif>{!! $type !!}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-3 inner-col-md-3">
        <input type="text" class="form-control" id="location" placeholder="Choose Location" />
        <input type='hidden' id='location_id' name="location_id" >
    </div>
    <div class="col-md-2 inner-col-md-2">
        <select class="form-control type" name="price_range">
            <option value="" selected="selected">Price Range</option>
            <option value="0-250" @if(!empty($requestData['price_range'])) @if('0-250000' == $requestData['price_range']) selected="selected"@endif @endif>Upto $250K</option>
            <option value="250000-500000" @if(!empty($requestData['price_range'])) @if('250000-500000' == $requestData['price_range']) selected="selected"@endif @endif>$250K-$500K</option>
            <option value="500000-650000" @if(!empty($requestData['price_range'])) @if('500000-650000' == $requestData['price_range']) selected="selected"@endif @endif>$500K-$650K</option>
            <option value="650000-750000" @if(!empty($requestData['price_range'])) @if('650000-750000' == $requestData['price_range']) selected="selected"@endif @endif>$650K-$750K</option>
            <option value="750000-1000000" @if(!empty($requestData['price_range'])) @if('750000-1000000' == $requestData['price_range']) selected="selected"@endif @endif>$750 K-$1M</option>
            <option value="1000000-10000000000" @if(!empty($requestData['price_range'])) @if('1000000-10000000000' == $requestData['price_range']) selected="selected"@endif @endif>$1M Over</option>
        </select>
    </div>
    <div class="col-md-2 inner-col-md-2 bed">
        <select class="form-control type" name="number_of_bedrooms">
            <option value="" selected="selected">Beds</option>
            @for($i=0;$i<=3;$i++)
                <option value="{!! $i !!}"
                        @if(!empty($requestData['number_of_bedrooms'])) @if($i == $requestData['number_of_bedrooms']) selected="selected"@endif @endif>{!! $i !!}</option>
            @endfor
            <option value="4"
                    @if(!empty($requestData['number_of_bedrooms'])) @if(4 == $requestData['number_of_bedrooms']) selected="selected"@endif @endif>
                4+
            </option>
        </select>
    </div>
    <div class="col-md-2 inner-col-md-2 bath">
        <select class="form-control type" name="number_of_bathrooms">
            <option value="" selected="selected">Baths</option>
            @for($i=0;$i<=4;$i=$i+0.5)
                <option value="{!! $i !!}"
                        @if(!empty($requestData['number_of_bathrooms'])) @if($i == $requestData['number_of_bathrooms']) selected="selected"@endif @endif>{!! $i !!}</option>
            @endfor
            <option value="4"
                    @if(!empty($requestData['number_of_bathrooms'])) @if(4 == $requestData['number_of_bathrooms']) selected="selected"@endif @endif>
                4+
            </option>
        </select>
    </div>
    <div class="col-md-2 inner-col-md-2 park">
        <select class="form-control type" name="number_of_garages">
            <option value="" selected="selected">Garage</option>
            @for($i=0;$i<=3;$i++)
                <option value="{!! $i !!}"
                        @if(!empty($requestData['number_of_garages'])) @if($i == $requestData['number_of_garages']) selected="selected"@endif @endif>{!! $i !!}</option>
            @endfor
        </select>
    </div>
    <button class="btn btn-primary inner-btn-search">Search</button>
