<table>
	<tr>
		<td>Name:</td>
		<td>{{$data['name']}}</td>
	</tr>
	<tr>
		<td>Address:</td>
		<td>{{$data['address']}}</td>
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
		<td>How did you hear about Multi Dynamic?</td>
		<td>{{ implode(', ', $data['reference_source']) }}</td>
	</tr>
	<tr>
		<td>Where would you prefer to buy?</td>
		<td>{{ DataHelper::getLocationName($data['location']) }}</td>
	</tr>
	<tr>
		<td>Do you have your finance ready?</td>
		<td>{{ $data['finance_ready'] }}</td>
	</tr>
	<tr>
		<td>What is your budget?</td>
		<td>{{ $data['budget'] }}</td>
	</tr>
	<tr>
		<td>How long have you been looking for property?</td>
		<td>{{ $data['length_looking_for_property'] }}</td>
	</tr>
	<tr>
		<td>Within what period of time are you planning to buy the property?</td>
		<td>{{ $data['period_of_time_to_buy_property'] }}</td>
	</tr>
	<tr>
		<td>Are you first home buyer or investor?</td>
		<td>{{ $data['first_home_buyer_investor'] }}</td>
	</tr>
</table>