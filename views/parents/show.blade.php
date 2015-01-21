<!-- app/views/parents/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Display Parents</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('parents') }}">Parents</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('parents') }}">View All Parents</a></li>
		<li><a href="{{ URL::to('parents/create') }}">New Parent</a>
	</ul>
</nav>

<h1>Showing {{ $parents->lname }}, {{$parents->fname}} </h1>

	<div class="table">
		<table>

			<tr><td>Date of Birth:<td>
			<tr><td>Address:<td>{{$parents->address1}}
			<tr><td>City:<td>{{$parents->city}}
			<tr><td>Postal Code:<td>{{$parents->postalcode}}
			<tr><td>State:<td>{{$parents->state}}
			<tr><td>Country:<td>{{$parents->country}}
			<tr><td>Phone:<td>{{$parents->phone}}
			<tr><td>Fax:<td>{{$parents->fax}}
			<tr><td>Email:<td>{{$parents->email}}
			<tr><td>Student(s):<td>
			@foreach($students as $student)
				@if($student->parent1 === $parents->id)
				{{$student->slname}}, {{$student->sfname}}
				@endif
				@if($student->parent2 === $parents->id)
				{{$student->slname}}, {{$student->sfname}}
				@endif
			@endforeach


		</table>
			
	</div>

</div>
</body>
</html>
