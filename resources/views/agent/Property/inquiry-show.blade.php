<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Inquiry Detail</h4>
</div>
<div class="modal-body">
    <table class="display table table-bordered table-condensed" >
        <tr>
            <td>Property Name</td>
            <td><a href="{!! route('properties.show', $inquiry->property->slug) !!}" target="_blank">{!! $inquiry->property->property_name !!}</a></td>
        </tr>
        <tr>
            <td>Full Name</td>
            <td>{!! $inquiry->full_name !!}</td>
        </tr>
        <tr>
            <td class="gray-bg">Email Address</td>
            <td>{!! $inquiry->email_address !!}</td>
        </tr>
        <tr>
            <td class="gray-bg">Phone Number</td>
            <td>{!! $inquiry->phone_number !!}</td>
        </tr>
        <tr>
            <td class="gray-bg">Message</td>
            <td>{!! $inquiry->message !!}</td>
        </tr>
    </table>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
