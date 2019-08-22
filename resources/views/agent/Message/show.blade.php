<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Message Detail</h4>
</div>
<div class="modal-body">
    <table class="display table table-bordered table-condensed" >
        <tr>
            <td>Full Name</td>
            <td>{!! $message->full_name !!}</td>
        </tr>
        <tr>
            <td class="gray-bg">Email Address</td>
            <td>{!! $message->email_address !!}</td>
        </tr>
        <tr>
            <td class="gray-bg">Phone Number</td>
            <td>{!! $message->phone_number !!}</td>
        </tr>
        <tr>
            <td class="gray-bg">Message</td>
            <td>{!! $message->message !!}</td>
        </tr>
    </table>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
