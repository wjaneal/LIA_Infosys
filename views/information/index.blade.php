@extends($view==="staff"? "layout_staff": "layout_international")
@section("content")

<H1>{{GlobalHelpers::showGlobal('schoolname')}} - School Documents and Information</H1>
<H2><a href={{URL::asset('downloads/Application-Form-2013.pdf')}}>Application Form</a></H2>
<H2><a href={{URL::asset('downloads/LIA-Fee-Schedule-2015.pdf')}}>Fee Schedule</a></H2>
<H2><a href={{URL::asset('downloads/Flyer-EN-P1.pdf')}}>Flyer - English - Page 1</a></H2>
<H2><a href={{URL::asset('downloads/Flyer-EN-P2.pdf')}}>Flyer - English - Page 2</a></H2>
<H2><a href={{URL::asset('downloads/Korean.pdf')}}>Flyer - Korean</a></H2>
<H2><a href={{URL::asset('downloads/Russian')}}>Flyer - Russian</a></H2>
@stop

 
 
 

