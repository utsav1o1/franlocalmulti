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
            <option value="" selected="selected">Weekely price</option>
            <option value="250-500" @if(!empty($requestData['price_range'])) @if('250-500' == $requestData['price_range']) selected="selected"@endif @endif>$250-$500</option>
            <option value="500-650" @if(!empty($requestData['price_range'])) @if('500-650' == $requestData['price_range']) selected="selected"@endif @endif>$500-$650</option>
            <option value="650-850" @if(!empty($requestData['price_range'])) @if('650-850' == $requestData['price_range']) selected="selected"@endif @endif>$650-$850</option>
            <option value="850-1000" @if(!empty($requestData['price_range'])) @if('850-1000' == $requestData['price_range']) selected="selected"@endif @endif>$850-$1000</option>
            <option value="1000-1200" @if(!empty($requestData['price_range'])) @if('1000-1200' == $requestData['price_range']) selected="selected"@endif @endif>$1000-$1200</option>
            <option value="1200-1400" @if(!empty($requestData['price_range'])) @if('1200-1400' == $requestData['price_range']) selected="selected"@endif @endif>$1200-$1400</option>
            <option value="1400-1600" @if(!empty($requestData['price_range'])) @if('1400-1600' == $requestData['price_range']) selected="selected"@endif @endif>$1400-$1600</option>
            <option value="1600-10000000" @if(!empty($requestData['price_range'])) @if('1600-10000000' == $requestData['price_range']) selected="selected"@endif @endif>$1600 Over</option>
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