<!DOCTYPE html>
<html>
<body onload="window.print()">

<h2 align="center">{!! $property->property_name !!}</h2>

@if($property->coverImage)
    @if(file_exists('storage/properties/'.$property->id.'/'.$property->coverImage->thumb_attachment ) && $property->coverImage->thumb_attachment != '')
        <img src="{!! asset('storage/properties/'.$property->id.'/'.$property->coverImage->thumb_attachment) !!}"
             alt="{!! $property->property_name !!}" width="100%"/>
    @endif
@endif

<ul>
    @if($property->area)
        <li>Area : {!! $property->area !!} square meter</li>
    @endif
    @if($property->category)
        @if($property->category->slug != 'land')
            <li>Number Of Bedroom : {!! $property->number_of_bedrooms !!}</li>
            <li>Number Of Bathroom : {!! $property->number_of_bathrooms !!}</li>
            <li>Number Of Garages : {!! $property->number_of_garages !!}</li>
        @endif
    @endif
    <li>Location : {!! $property->location->location_name !!}</li>
    <li>Property Type : {!! $property->propertyType ? $property->propertyType->property_type : ''!!}</li>
    <li>Agent : {!! $property->agent->first_name .' '. $property->agent->last_name !!}</li>
    <li>{!! $property->priceType ? $property->priceType->heading : '' !!}: {{ $property->getFormattedPrice() }}</li>
</ul>

<div>{!! $property->description !!}</div>


</body>
</html>