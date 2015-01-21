@extends("layout_international")
@section("content")
   <H2>International Department Expenditures</H2> 
{{ Form::open(array('url' => 'expenditures')) }}
<H3>Please enter a subcategory:</H3>
{{Form::select('subcategory', $subcategory_options, array('class'=>'form-control'))}}
<H3>Please enter an amount:</H3>
{{Form::text('amount')}}
<H3>Please enter a date (yyyy-mm-dd) (leave blank for today's date):</H3>
{{Form::text('date')}}
<H3>Enter a description:</H3>
{{Form::text('description')}}
<p>
{{ Form::submit('Submit Expenditure')}}
{{Form::close()}}
@stop
