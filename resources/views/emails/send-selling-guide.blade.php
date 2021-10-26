Dear {{$data['name']}},<br />
<br />
Please use the link below to download your Selling Guide copy.</br />
@if(!empty($data['selling']))
<a href="{!! $data['selling'] !!}" target="_blank">Donwload Selling Guide</a>
@endif