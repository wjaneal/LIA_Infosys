@extends("layout")
@section("content")
<H1>Testing</H1>
<table>
{{var_dump($classes)}}
@foreach($classes as $class)
	<tr><td>{{$class['tlname']}}<td>{{$class['tfname']}}
	<tr>
	@foreach($class['class_list'] as $student)
		<td>{{$student['slname']}}
	@endforeach
@endforeach
</table>
@stop

 
 
 

