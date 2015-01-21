@extends('layout_expenses')
@section('content')
{{Form::model($expenses, array('route' => array('expense.update', $expenses->id)))}}
<h1>Create an Invoice</h1>
{{ HTML::ul($errors->all()) }}
{{ Form::open(array('url' => 'expenses')) }}
<h3>Please select a student:</h3>
{{Form::select('student', $student_options, array('Form'=>'Control'))}}
<h3>Please select the student's fees:</h3>
<table padding=2 class="table">
{{Form::hidden('applicationfee', 0)}}
{{Form::hidden('guardianshipfee',0)}}
{{Form::hidden('tuitiondeposit',0 )}}
{{Form::hidden('tuitionsem0', 0)}}
{{Form::hidden('tuitionsem1', 0)}}
{{Form::hidden('tuitionsem2', 0)}}
{{Form::hidden('tuitionsem3', 0)}}
{{Form::hidden('accja', 0)}}
{{Form::hidden('accsd', 0)}}
{{Form::hidden('accjapr', 0)}}
{{Form::hidden('accmj', 0)}}
{{Form::hidden('uniform', 0)}}
{{Form::hidden('airport', 0)}}
{{Form::hidden('activityfee', 0)}}
{{Form::hidden('depositpaid', 0)}}
{{Form::hidden('scholarshipcredits', 0)}}
{{Form::hidden('tuitiondeposit', 0)}}
{{Form::hidden('residencedeposit', 0)}}
{{Form::hidden('homestayfee', 0)}}
{{Form::hidden('materialsfee', 0)}}



	<tr class="success"><td background="green"><td><td><td><td>
	<tr><td><strong>Date:</strong><td>{{Form::text('date')}}<td><td>
	<tr class="success"><td background="green"><td><td><td><td>
	<tr><td><strong>Application Fee</strong><td>{{"$".$fees[0]["applicationfee"]}}<td>{{Form::checkbox('applicationfee',1, TRUE )}}<td><td>
	<tr><td><strong>Guardianship Fee</strong><td>{{"$".$fees[0]["guardianshipfee"]}}<td>{{Form::checkbox('guardianshipfee',1, FALSE )}}<td><td>
	<tr><td><strong>School Uniform</strong><td>{{"$".$fees[0]["uniform"]}}<td>{{Form::checkbox('uniform',1,TRUE )}}<td><td>
	<tr><td><strong>Airport Pickup</strong><td>{{"$".$fees[0]["airport"]}}<td>{{Form::checkbox('airport',1,FALSE )}}<td><td>
	<tr><td><strong>Student Activity Fee</strong><td>{{"$".$fees[0]["activityfee"]}}<td>{{Form::checkbox('activityfee',1,TRUE )}}<td><td>
	<tr><td><strong>Materials Fee</strong><td>{{"$".$fees[0]["materialsfee"]}}<td>{{Form::checkbox('materialsfee',1,TRUE )}}<td><td>


	<tr class="success"><td background="green"><td><td><td><td>
	<tr><td><strong>Tuition Deposit</strong><td><td>${{Form::text('tuitiondeposit')}}<td><td>
	<tr><td><strong>Deposit Already Paid</strong><td><td>${{Form::text('depositpaid')}}<td><td>
	<tr><td><strong>Credits (July-August)</strong><td><td>{{Form::select('tuitionsem0',array(0=>0,1=>1,2=>2))}}<td><td>
	<tr><td><strong>Credits (September-December)</strong><td><td>{{Form::select('tuitionsem1',array(0=>0,1=>1,2=>2, 3=>3,4=>4) )}}<td><td>
	<tr><td><strong>Credits (January-April)</strong><td><td>{{Form::select('tuitionsem2',array(0=>0,1=>1,2=>2,3=>3,4=>4))}}<td><td>
	<tr><td><strong>Credits (May-June)</strong><td><td>{{Form::select('tuitionsem3',array(0=>0,1=>1,2=>2))}}<td><td>
	<tr><td><strong>Scholarship Credits</strong><td><td>{{Form::select('scholarshipcredits', array('0'=>'0', '1'=>'1', '2'=>'2', '3'=>'3', '4'=>'4', '5'=>'5', '6'=>'6', '7'=>'7', '8'=>'8', '9'=>'9', '10'=>'10'))}}<td><td>
	<tr class="success"><td background="green"><td><td><td><td>

	<tr><td><strong>Accommodation Fee (July-August)</strong><td>{{Form::select('accja', array(0=>'None','Residence - Double'=>'Residence - Double', 'Residence - Single'=>'Residence - Single', 'Homestay'=>'Homestay'))}}
	<tr><td><strong>Accommodation Fee (September-December)</strong><td>{{Form::select('accsd', array(0=>'None', 'Residence - Double'=>'Residence - Double', 'Residence - Single'=>'Residence - Single', 'Homestay'=>'Homestay'))}}
	<tr><td><strong>Accommodation Fee (January-April)</strong><td>{{Form::select('accjapr', array(0=>'None', 'Residence - Double'=>'Residence - Double', 'Residence - Single'=>'Residence - Single', 'Homestay'=>'Homestay'))}}
	<tr><td><strong>Accommodation Fee (May-June)</strong><td>{{Form::select('accmj', array(0=>'None', 'Residence - Double'=>'Residence - Double', 'Residence - Single'=>'Residence - Single', 'Homestay'=>'Homestay'))}}
	<tr><td><strong>Meals</strong><td>{{Form::select('meals',array(0=>'None', 'full'=>'Three Meals Daily' , 'two'=>'Two Meals', 'lunch'=>'Lunch Only'))}}<td><td>
	<tr><td><strong>Residence Deposit</strong><td>{{"$".$fees[0]["residencedeposit"]}}<td>{{Form::checkbox('residencedeposit',800,FALSE )}}<td><td>
	<tr><td><strong>Homestay Fee</strong><td>{{"$".$fees[0]["homestayfee"]}}<td>{{Form::checkbox('homestayfee',450,FALSE )}}<td><td>
	<tr class="success"><td background="green"><td><td><td><td>
	<tr><td><strong>Health Insurance (Year)</strong><td>{{"$".$fees[0]["healthyear"]}}<td>{{Form::radio('health',12,TRUE )}}<td><td>
	<tr><td><strong>Health Insurance (6 months)</strong><td>{{"$".$fees[0]["healthsix"]}}<td>{{Form::radio('health',6,FALSE )}}<td><td>
	<tr><td><strong>Health Insurance (3 months)</strong><td>{{"$".$fees[0]["healththree"]}}<td>{{Form::radio('health',3,FALSE )}}<td><td>
	<tr><td><strong>Health Insurance Not Required</strong><td>{{"$0"}}<td>{{Form::radio('health',0,FALSE )}}<td><td>
</table>

	{{ Form::submit('Calculate Student Expenses', array('class' => 'btn btn-primary')) }}

{{ Form::close() }}

</div>
</body>
</html>
@stop
