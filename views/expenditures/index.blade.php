@extends('layout_international')
@section('content')
<H1>Budget Spending Summary</H1>
<table class="table">
	<tr><th>Budget Category<th>Budget Subcategory<th>Amount Spent<th>Budget Amount<th>Percent Spent
	@foreach($budget as $b)
			
			<tr><td>{{$b->category}}<td>{{$b->subcategory}}	
		@foreach($subcategory_totals as $st)
			@if($b->subcategory === $st->subcategory)
				<td>$ {{number_format($st->sum1,2,".",",")}}
			<td>$ {{number_format($b->amount,2, ".", ",")}}<td> {{number_format($st->sum1*100/$b->amount, 2, ".",",")}}%
			@endif
		@endforeach
		

	@endforeach
	

</table>


<H1>Individual Invoices</H1>
<table class="table">
	<tr><th>Date<th>Subcategory<th>Amount<th>Description
	@foreach($expenditures as $expenditure)
	<tr><td>{{$expenditure->date}}<td>{{$expenditure->subcategory}}<td>{{$expenditure->amount}}<td>{{$expenditure->description}}
        @endforeach
</table>
@stop

