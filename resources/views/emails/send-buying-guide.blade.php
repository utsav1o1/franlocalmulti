Dear {{$data['name']}},<br />
<br />
Please use the link below to download your Buying Guide copy.</br />

@if(!empty($data['buying']))
<a href="{!! $data['buying'] !!}" target="_blank">Donwload Buying Guide</a>
@endif