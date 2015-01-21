<!-- app/views/students/show.blade.php -->

<!DOCTYPE html>
<html>
<head>
	<title>Display Students</title>
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

<nav class="navbar navbar-inverse">
	<div class="navbar-header">
		<a class="navbar-brand" href="{{ URL::to('students') }}">Students</a>
	</div>
	<ul class="nav navbar-nav">
		<li><a href="{{ URL::to('students') }}">View All Students</a></li>
		<li><a href="{{ URL::to('students/create') }}">New Student</a>
	</ul>
</nav>

<h1>Showing {{ $students->slname }}</h1>

	<div class="jumbotron text-center">
		<h2>{{ $students->slname }}</h2>
		<p>
			<strong>Name:</strong> {{ $students->sfname }}<br>
			<strong>Grade:</strong> {{ $students->grade }}
		</p>
	</div>

</div>
</body>
</html>
