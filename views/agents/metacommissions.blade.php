@extends("layout_agent")
@section("content")
<H1>Metacommissions</H1>
@if(isset($numagents))
	<H2>{{$agent->alname}}, {{$agent->afname}}</H2>
	<H2>Number of Agents Referred: {{$numagents}}</H2>
	<H2>Number of Students Meta-Referred: {{$totalstudents}}</H2>
	<H2>Commission Level:  {{CommissionHelpers::levels($totalstudents)}}</H2>
	@foreach($meta_agent_data as $agent)
		<H3>{{$agent['name']}}</H3>	
		<table border=2> 
			<tr><th>Last Name<th>First Name<th>Grade<th>Date<th>Tuition Sem. 0<th>Tuition Sem. 1<th>Tuition Sem. 2<th>Tuition Sem. 3<th>Total Tuition<th>Commission<th>Agent Comm. %<th>Your Comm. %<th>Net %
		@foreach($agent['invoices'] as $invoice)
				@if ($tuitiontotal = $invoice->tuitionsem0amount+$invoice->tuitionsem1amount+$invoice->tuitionsem2amount+$invoice->tuitionsem3amount)@endif
				@if($tuitiontotal > 0)
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
					<td>$ {{number_format(CommissionHelpers::commission_differential($totalstudents, $agent['numstudents'], $invoice->grade, $tuitiontotal),2,'.',',')}}
					<td>{{CommissionHelpers::commission_percentage($invoice->grade, $agent['numstudents'])}} %
					<td>{{CommissionHelpers::commission_percentage($invoice->grade, $totalstudents)}} %
					<td>{{-CommissionHelpers::commission_percentage($invoice->grade, $agent['numstudents']) + CommissionHelpers::commission_percentage($invoice->grade, $totalstudents)}} %

				@endif
		@endforeach
		</table>
	@endforeach
	<H2>Total Commission: $ {{number_format($meta_commission,2,'.',',')}}</H2>
@else
<H2>You have not yet referred any agents</H2>
@endif
@stop

 
 
 

