@extends("layout_pdf")
@section("content")
<H3>Invoice - {{$pdf_data['slname']}}, {{$pdf_data['sfname']}}</H3>
<H4>Date: {{$pdf_data['new_expense']->date}} - Invoice Number: {{$pdf_data['new_expense']->invoicenumber}}</H4>
<table border=2 width=100%>
	<tr colspan=2><td colspan=2><strong>Fees</strong>
		@if($pdf_data['new_expense']->applicationfee === true)
			<tr><td>Application Fee: <td>$ 
			{{$pdf_data['fees']->applicationfee}}
		@endif
		@if($pdf_data['new_expense']->guardianshipfee === true)
			<tr><td>Guardianship Fee: <td>$ 
			{{$pdf_data['fees']->guardianshipfee}}
		@endif
		@if($pdf_data['new_expense']->activityfee === true)
			<tr><td>Activity Fee: <td>$ 
			{{$pdf_data['fees']->activityfee}}
		@endif
		@if($pdf_data['new_expense']->materialsfee === true)
			<tr><td>Materials Fee: <td>$ 
			{{$pdf_data['fees']->materialsfee}}
		@endif
		@if($pdf_data['new_expense']->airport === true)
			<tr><td>Airport Pickup: <td>$ 
			{{$pdf_data['fees']->airport}}
		@endif
		@if($pdf_data['new_expense']->uniform === true)
			<tr><td>Uniform: <td>$ 
			{{$pdf_data['fees']->uniform}}
		@endif
		@if($pdf_data['new_expense']->healthamount > 0)
			<tr><td>Health Insurance: <td>$ 
			{{$pdf_data['new_expense']->healthamount}}
		@endif
			<tr><td colspan=2><strong>Accommodation</strong>
			<tr><td colspan=2><strong>Total Months: {{$pdf_data['new_expense']->months}}</strong>
		@if($pdf_data['new_expense']->acc0 != 0)
			<tr><td>July-August: <td>$ 
			{{$pdf_data['new_expense']->acc0amount}}
		@endif
		@if($pdf_data['new_expense']->acc1 != 0)
			<tr><td>September-December: <td>$ 
			{{$pdf_data['new_expense']->acc1amount}}
		@endif
		@if($pdf_data['new_expense']->acc2 != 0)
			<tr><td>January-April: <td>$ 
			{{$pdf_data['new_expense']->acc2amount}}
		@endif
		@if($pdf_data['new_expense']->acc3 != 0)
			<tr><td>May-June: <td>$ 
			{{$pdf_data['new_expense']->acc3amount}}
		@endif
		@if($pdf_data['new_expense']->residencedeposit > 0)
			<tr><td>Residence Deposit: <td>$ 
			{{$pdf_data['new_expense']->residencedeposit}}
		@endif
		@if($pdf_data['new_expense']->homestayfee > 0)
			<tr><td>Homestay Fee ({{$pdf_data['new_expense']->months}} months): <td>$ 
			{{$pdf_data['new_expense']->homestayfee}}
		@endif

			<tr><td colspan=2><strong>Meals</strong>
			@if($pdf_data['new_expense']->mealplan === "None")
				<tr><td>No Meal Plan<td>$ 
			@endif
				@if($pdf_data['new_expense']->mealplan === "Two")
			<tr><td>Two Meals Daily><td>$ 
			@endif
			@if($pdf_data['new_expense']->mealplan === "Three")
			<tr><td>Three Meals Daily<td>$ 
			@endif
			@if($pdf_data['new_expense']->mealplan === "Lunch")
			<tr><td>Lunch<td>$ 
			@endif
			{{$pdf_data['new_expense']->meals}}
	

			<tr><td colspan=2><strong>Tuition ({{$pdf_data['new_expense']->credits}} credits)</strong>
		@if($pdf_data['new_expense']->depositpaid > 0)
			<tr><td>Tuition Deposit Already Paid: <td>$ 
			({{$pdf_data['new_expense']->depositpaid}})
		@endif
		@if($pdf_data['new_expense']->tuitiondeposit > 0)
			<tr><td>Tuition Deposit: <td>$ 
			{{$pdf_data['new_expense']->tuitiondeposit}}
		@endif
		@if($pdf_data['new_expense']->tuitionsem0amount > 0)
			<tr><td>July-August: <td>$ 
			{{$pdf_data['new_expense']->tuitionsem0amount}}
		@endif
		@if($pdf_data['new_expense']->tuitionsem1amount > 0)
			<tr><td>September-December: <td>$ 
			{{$pdf_data['new_expense']->tuitionsem1amount}}
		@endif
		@if($pdf_data['new_expense']->tuitionsem2amount > 0)
			<tr><td>January-April: <td>$ 
			{{$pdf_data['new_expense']->tuitionsem2amount}}
		@endif
		@if($pdf_data['new_expense']->tuitionsem3amount > 0)
			<tr><td>May-June: <td>$ 
			{{$pdf_data['new_expense']->tuitionsem3amount}}
		@endif
		@if($pdf_data['new_expense']->scholarshiptotal > 0)
			<tr><td>Scholarship ({{$pdf_data['new_expense']->scholarshipcredits}} credits): <td>$ ( 
			{{$pdf_data['new_expense']->scholarshiptotal}})
		@endif
			<tr><td><h2>Total: </h2><td><h2>$
			{{number_format($pdf_data['new_expense']->total,2,".",",")}}</h2>
		<tr><td colspan=2>
			<p>We accept bank drafts / certified cheques payable to:
			<p><strong>{{GlobalHelpers::showGlobal('schoolname')}}</strong>
			<p>For bank transfers, please use the following information:
			<p>Account Name: {{GlobalHelpers::showGlobal('schoolname')}}
			<p>Bank Name: HSBC Bank Canada
			<p>Bank Address: 285 King St., London, ON, N6B3M6, Canada
			<p>Account Number: 352-033452-001
			<p>SWIFT Code: HKBCCATT
			<p>Transit Number: 10352-016
			<p>Routing Number: 001610352
</table>
@stop

 
 
 

