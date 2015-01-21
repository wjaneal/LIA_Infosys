@extends('layout')
@section('content')
{{Form::open(['url' => 'studentsteps'])}}
<table border = 2>
@foreach($categories as $category)
	<tr>
	<td>{{$category}}
	<td><table border=2 cellpadding=0>
	@foreach($element_lists as $key=>$elements)
		@if($key === $category)	
			@foreach($elements as $element)
				<tr><td>{{$element}}
				<td>
				<table>
				@foreach($subelement_lists as $key2=>$subelements)
					@if($key2 === $category.' '.$element)
						@foreach($subelements as $subelement)
							<tr><td>{{$subelement}}
							@for($i=1; $i<7; $i++)
								<tr><td>
								@foreach($text_lists as $key3=>$text_list)
									@if($key3 === $category.' '.$element.' '.$subelement.' '.$i)
										@foreach($text_list as $text=>$step)
											<tr><td>
											{{Form::checkbox($key3)}}
											{{$step}}
											{{$text}}
										@endforeach
										<p>--------------------------------------------------------------------------------------------------------------------------------------------
									@endif
								@endforeach
							@endfor
						@endforeach
					@endif
				@endforeach
				</table>
			@endforeach
		@endif
	@endforeach
	</table></td>
@endforeach
</table>
{{ Form::submit('Submit Step')}}
{{Form::close()}}
@stop
