@section("staff_header")
    <div class="header">
        <div class="container">
		<img src={{asset('tight.jpg')}} width = 25%></img>
            <h1>{{GlobalHelpers::showGlobal(('schoolname'))}} - Information System - Agents</h1>
            @if (Auth::check())
		<div class="navbar navbar-inverse">
			<div class= "navbar-header"> 
				<a class="navbar-brand" href="{{ URL::to('students')}}">Main</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{URL::to('agents/introduction')}}">Introduction</a></li>
				<li><a href="{{URL::to('parents')}}">Parents</a></li>
                                <li><a href="{{URL::to('parents/create/admin')}}">Add a New Parent</a></li>
				<li><a href="{{URL::to('agents/create')}}">Create a New Agent</a></li>		
				<li><a href="{{URL::to('agents')}}">View Agents</a></li>		

				<li><a href="{{URL::to('documents/create')}}">Upload a Document</a></li>
				<li><a href="{{URL::to('students/create')}}">Submit a New Student</a></li>
i				<li><a href="{{URL::to('expenses')}}">View all Invoices</a></li>
                                <li><a href="{{URL::to('expenses/create')}}">Create a New Invoice</a></li>

				<li><a href="{{URL::to('students/status')}}">Check Student Status</a></li>

				<li><a href="{{URL::to('staffnotes/create')}}">Create a New Note</a></li>		
				<li><a href="{{URL::to('staffnotes')}}">View Notes</a></li>		
				<li><a href="{{URL::to('staffnotes/selectindividual')}}">Individual Notes</a></li>		

				<li><a href="{{URL::to('agents/pendingcommissions')}}">View Commissions</a></li>		
				<li><a href="{{URL::to('agents/metacommissions')}}">View Agent Commissions</a></li>		
				<li><a href="{{URL::to('information')}}">Download School Information</a></li>
			
			</ul>
		</div>
                <a href="{{ URL::route("user/logout") }}">
                    logout
                </a>
                |
                <a href="{{ URL::route("user/profile") }}">
                    profile
                </a>
		|
            @else
		<div class="navbar navbar-inverse">
			<div class="navbar-header">
				<a class="navbar-brand" href="{{URL::to('agents')}}">Main</a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="{{URL::to('user/login')}}"></a>Login</li>

</ul>
		</div>
            @endif
        </div>
    </div>
@show

