@extends($view==="staff" ? "layout_staff":"layout_international")
@section("content")
<h1>Showing: {{ $agent->alname }}, {{$agent->afname}}</h1>
<table border=2>
		 <tr>
                        <td><strong>Title</strong><td>{{ $agent->title}}</td>
                <tr>
                        <td><strong>Surname</strong><td>{{ $agent->alname }}</td>
                <tr>
                        <td><strong>Name</strong><td>{{ $agent->afname }}</td>
                <tr>
                        <td><strong>Address</strong><td>{{$agent->address}}</td>
                <tr>
                        <td><strong>City</strong><td>{{$agent->city}}</td>
                <tr>
                        <td><strong>Postal Code</strong><td>{{$agent->postalcode}}</td>
                <tr>
                        <td><strong>Country</strong><td>{{$agent->country}}</td>
		<tr>
			<td><strong>Company</strong><td>{{$agent->company}}</td>
                <tr>
                        <td><strong>Job Title</strong><td>{{$agent->jobtitle}}</td>
                <tr>
                        <td><strong>Cell Phone</strong><td>{{$agent->cphone}}</td>
                <tr>
                        <td><strong>Business Phone</strong><td>{{$agent->bphone}}</td>
                <tr>
                        <td><strong>Fax</strong><td>{{$agent->fax}}</td>
                <tr>
                        <td><strong>Email</strong><td>{{$agent->email}}</td>
                <tr>
                        <td><strong>Website</strong><td>{{$agent->website}}</td>
                <tr>
                        <td><strong>Payment Preference</strong><td>{{$agent->paymentpreference}}</td>
                <tr>
                        <td><strong>Payee Name</strong><td>{{$agent->payeename}}<td>
                <tr>
                        <td><strong>Bank Information</strong><td>{{$agent->bankinformation}}</td>
                <tr>
                        <td><strong>Agent Type</strong><td>{{$agent->agenttype}}</td>

		</p>

</table>
</body>
</html>
