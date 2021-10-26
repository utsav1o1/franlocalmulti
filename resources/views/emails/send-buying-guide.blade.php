Hi {{$data['name']}},<br />
<br />
Please find the attachment of buying home guide below:</br />

@if(!empty($data['buying']))
<a href="{!! $data['buying'] !!}" target="_blank">Donwload Buying Guide</a>
@endif