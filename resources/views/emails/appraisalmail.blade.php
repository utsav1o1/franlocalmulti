Hi there,<br />
<br />
Please find the details of a new appraisal booking below:</br/>
<table>
	<tr>
		<td>Name:</td>
		<td>{{$data['fname']}} {{$data['lname']}}</td>
	</tr>
	<tr>
		<td>Address:</td>
		<td>{{$data['address']}}, {{$data['suburb']}}, {{$data['postcode']}}</td>
	</tr>
	<tr>
		<td>Email:</td>
		<td>{{$data['email']}}</td>
	</tr>
	<tr>
		<td>Contact:</td>
		<td>{{$data['contact']}}</td>
	</tr>
	<tr>
		<td>Bedrooms:</td>
		<td>{{ $data['bed'] }}</td>
	</tr>
	<tr>
		<td>Bathrooms:</td>
		<td>{{ $data['bath'] }}</td>
	</tr>
	<tr>
		<td>Car Spaces:</td>
		<td>{{ $data['car'] }}</td>
	</tr>
	<tr>
		<td>Additional message:</td>
		<td>{{ $data['messages'] }}</td>
	</tr>
</table>