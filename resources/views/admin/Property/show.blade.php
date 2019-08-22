<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">View Property</h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12">
            <section class="panel">
                <div class="panel-body">
                    <div class="adv-table">

                        <table class="display table table-bordered table-condensed" id="property-detail-table">
                            <tr>
                                <td class="gray-bg">Agent Name</td>
                                <td class="agent">{!! $property->agent->first_name .' '. $property->agent->last_name !!}</td>
                            </tr>
                            <tr>
                                <td class="gray-bg">Property Name</td>
                                <td class="property_name">{!! $property->property_name !!}</td>
                                <td class="gray-bg">Property Price</td>
                                <td class="property_price">{!! $property->price !!}</td>
                            </tr>
                            <tr>
                                <td class="gray-bg">Property Category</td>
                                <td class="category">
                                    @if($property->category)
                                        {!! $property->category->property_category !!}
                                    @endif
                                </td>
                                <td class="gray-bg">Property Type</td>
                                <td class="propertyType">
                                    @if($property->propertyType)
                                        {!! $property->propertyType->property_type !!}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="gray-bg">Number Of Bedrooms</td>
                                <td class="number_of_bedrooms">{!! $property->number_of_bedrooms !!}</td>
                                <td class="gray-bg">Number Of Bathrooms</td>
                                <td class="number_of_bathrooms">{!! $property->number_of_bathrooms !!}</td>
                            </tr>
                            <tr>
                                <td class="gray-bg">Number Of Garages</td>
                                <td class="number_of_garages">{!! $property->number_of_garages !!}</td>
                            </tr>
                            <tr>
                                <td class="gray-bg">Description</td>
                                <td class="description">{!! $property->description !!}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>