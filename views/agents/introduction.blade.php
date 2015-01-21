@extends($view==="staff"? "layout_staff":"layout_international")
@section("content")
<H1>{{GlobalHelpers::showGlobal('schoolname')}} Agent Portal</H1>
<p>Welcome to the {{GlobalHelpers::showGlobal('schoolname')}} agent portal.  This site can be used by {{GlobalHelpers::showGlobal('schoolname')}} Agents to:
<ul>
<li><a href={{URL::to('students/create')}}>Submit Students to the School</a>
<li><a href={{URL::to('documents/create')}}>Upload their Documents</a>
<li><a href={{URL::to('students/index')}}>Check their Status</a>
<li><a href={{URL::to('agents/create')}}>Refer other Agents</a>
<li><a href={{URL::to('agents/pendingcommissions')}}>Check Commissions</a>
<li><a href={{URL::to('information')}}>Download School Information</a>
</ul>
@stop

 
 
 

