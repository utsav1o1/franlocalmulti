Hi {{$data['name']}},<br />
<br />
Please find the attachment of selling home guide below:</br />
@if(!empty($data['selling']))
<a href="{!! $data['selling'] !!}" target="_blank">Donwload Selling Guide</a>
@endif