@section("header")
    <div class="header">
        <div class="container">
		<img src={{asset('tight.jpg')}} width = 25%></img>
	    <h1>{{GlobalHelpers::showGlobal('schoolname')}}</h1>

            @if (Auth::check())
		<div class="navbar navbar-inverse">
			<div class= "navbar-header"> 
				<a class="navbar-brand" href="{{ URL::to('students')}}">Students</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{URL::to('students')}}">View all Students</a></li>
				<li><a href="{{URL::to('students/create')}}">Add a New Student</a></li>
				<li><a href="{{URL::to('documents')}}">Documents</a></li>
				<li><a href="{{URL::to('expenses')}}">View all Invoices</a></li>
				<li><a href="{{URL::to('expenses/create')}}">Create a New Invoice</a></li>		
				<li><a href="{{URL::to('documents/create')}}">Upload a Document</a></li>
				<li><a href="{{URL::to('parents')}}">Parents</a></li>
				<li><a href="{{URL::to('parents/create/admin')}}">Add a New Parent</a></li>
				<li><a href="{{URL::to('agents')}}">Agents</a></li>
				<li><a href="{{URL::to('agents/create/admin')}}">Add a New Agent</a></li>
				<li><a href="{{URL::to('expenditures/create')}}">Submit an Expenditure</a></li>
				<li><a href="{{URL::to('expenditures')}}">Expenditure Summary</a></li>
				<li><a href="{{URL::to('staffnotes/create')}}">Create a New Note</a></li>
                                <li><a href="{{URL::to('staffnotes')}}">View Notes</a></li>

			</ul>
		</div>
                <a href="{{ URL::route("user/logout") }}">
                    logout
                </a>
                |
                <a href="{{ URL::route("user/profile") }}">
                    profile
                </a>
            @else
		<div class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('students')}}">Students</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{URL::to('students')}}">Home</a></li>





			</ul>
		</div>
            @endif
        </div>
    </div>
@show
