@extends($view=='staff' ? "layout_staff":"layout_international")
<!--# This Source Code Form is subject to the terms of the Mozilla Public
# License, v. 2.0. If a copy of the MPL was not distributed with this
# file, You can obtain one at http://mozilla.org/MPL/2.0/.-->
@section("content")
   <H2>Student Document Upload</H2> 
{{ Form::open(array('url' => 'documents', 'files' => true)) }}
<H3>Please enter a document type:</H3>
{{Form::select('type', array('Passport'=>'Passport', 'Visa'=>'Visa', 'Study Permit'=>'Study Permit','Other'=>'Other'), array('class'=>'form-control'))}}
<H3>Please enter an expiry date:</H3>
{{Form::text('expiry')}}
<H3>Please select a student:</H3>
{{Form::select('sid', $students, array('class'=>'form-control'))}}
<H3>Enter a document number or description:</H3>
{{Form::text('description')}}
<H3>Please select a file to upload.</H3>
{{ Form::file('file')}}
<p>
<p>
<p>
{{ Form::submit('Upload File')}}
{{Form::close()}}
@stop
