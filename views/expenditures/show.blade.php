@extends('layout')
@section('content')
<h1>Showing 
	@foreach($students as $student)
		@if($student->id === $documents->sid)
			{{ $student->slname }}, {{$documents->sfname}}
		@endif
	@endforeach
</h1>
	

        <div class="jumbotron text-center">
                <h2>{{ $documents->description }}</h2>
                <p>
                        <strong>Description:</strong> {{ $documents->description }}<br>
                        <strong>Location:</strong> {{ $documents->location }}
                </p>
        </div>

</div>
@stop
