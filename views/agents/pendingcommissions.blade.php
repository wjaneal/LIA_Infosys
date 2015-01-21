@extends("layout_agent")
@section("content")
<H2>{{$agent->alname}}, {{$agent->afname}}</H2>
<H2>Number of Students Referred: {{$numstudents}}</H2>
<H2>Commission Level:  {{CommissionHelpers::levels($numstudents)}}</H2>
<table border=2>
	<tr><th>Last Name<th>First Name<th>Grade<th>Date<th>Tuition Sem. 0<th>Tuition Sem. 1<th>Tuition Sem. 2<th>Tuition Sem. 3<th>Total Tuition<th>Commission
@foreach($invoices as $invoice)
		<tr>
		<td>{{$invoice->slname}}
		<td>{{$invoice->sfname}}
		<td>{{$invoice->grade}}
		<td>{{$invoice->date}}
		<td>$ {{$invoice->tuitionsem0amount}}
		<td>$ {{$invoice->tuitionsem1amount}}
		<td>$ {{$invoice->tuitionsem2amount}}
		<td>$ {{$invoice->tuitionsem3amount}}
		<td>$ {{number_format($invoice->tuitionsem0amount+$invoice->tuitionsem1amount+$invoice->tuitionsem2amount+$invoice->tuitionsem3amount,2,'.',',')}}
		@if ($tuitiontotal = $invoice->tuitionsem0amount+$invoice->tuitionsem1amount+$invoice->tuitionsem2amount+$invoice->tuitionsem3amount)@endif
		

		<td>$ {{number_format(CommissionHelpers::commission_calc($tuitiontotal,$invoice->grade,$numstudents),2,'.',',')}}

@endforeach
</table>
<H2>Total Commission: $ {{number_format($commission,2,'.',',')}}</H2>

@stop

 
 
 

