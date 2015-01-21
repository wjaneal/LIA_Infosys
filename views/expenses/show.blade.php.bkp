@extends('layout')
@section('content')
<h1>Showing {{ $students->slname.', '.$students->sfname }}</h1>

	<div class="jumbotron">
		<h2>{{$students->sfname}}{{" "}}{{ $students->slname }}</h2>
<table border = 2 class="table">

                <tr>
                        <td><strong>Gender</strong></td><td>{{$students->gender}}</td>
                        <td><strong>Grade</strong></td><td>{{$students->grade}}</td>
		<tr>
			<td><strong>Address</strong></td><td>{{$students->address}}</td>
			<td><strong>City</strong></td><td>{{$students->city}}</td>
		<tr>
			<td><strong>Postal Code</strong></td><td>{{$students->postalcode}}
                        <td><strong>Country</strong></td><td>{{$students->country}}</td>
		<tr>
			<td><strong>Phone</strong></td><td>{{$students->phone}}</td>
                        <td><strong>Account Name</strong></td><td>{{$students->account_name}}</td>
		<tr>
                        <td><strong>Student Email</strong></td><td colspan=3>{{$students->student_email_1}}</td>
                <tr>
                        <td><strong>Parent 1</strong></td><td>
				@foreach($parents as $parent)
					@if ($parent->id === $students->parent1)
						{{$parent->lname.', '.$parent->fname}}
					@endif
				@endforeach
			</td>
                        <td><strong>Parent 2</strong></td><td>
				@foreach($parents as $parent)
					@if ($parent->id === $students->parent2)
						{{$parent->lname.', '.$parent->fname}}
					@endif
				@endforeach

			</td>
                <tr>
                        <td><strong>First Language</strong></td><td>{{$students->flanguage}}</td>
                        <td><strong>Immigration Status</strong></td><td>{{$students->immigration}}</td>
                <tr>
                        <td><strong>Date of Entry to Canada</strong></td><td>{{$students->canada_doe}}</td>
                        <td><strong>Date of Entry to School</strong></td><td>{{$students->lia_doe}}</td>
                <tr>
                        <td><strong>Date of Birth</strong></td><td>{{$students->dob}}</td>
                        <td><strong>Assessment Date</strong></td><td>{{$students->assessment_date}}</td>
                <tr>
                        <td><strong>Education Note</strong></td><td colspan=3>{{$students->education_note}}</td>
                <tr>
                        <td><strong>Translator</strong></td><td>{{$students->translator}}</td>
                        <td><strong>Translator Relationship</strong></td><td>{{$students->trans_relationship}}</td>
                <tr>
                        <td><strong>Career Note</strong></td><td colspan=3>{{$students->career}}</td>
</table>
	</div>

</div>
</body>
</html>
@stop
