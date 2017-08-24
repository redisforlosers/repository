<nav class="navbar navbar-fixed-top navbar-default">
    <div class="container-fluid">
        {{-- Content that is displayed at all times in the navbar --}}
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span> 
            </button>
            <a class="navbar-brand" href="{{ route('dashboard') }}">
                <img src="{{ asset('images/lpl_logo.png') }}" alt="Logo">
                {{ config('app.name') }}
            </a>
        </div>

        @if (Auth::check())
            {{-- Content that is displayed above sm breakpoint --}}
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="{{ route('incidents') }}">
                            Incidents
                            <span class="badge badge-error badge-sm">
                                {{ Auth::user()->unviewedIncidents() }}
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('schedule') }}">
                            Scheduler
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('cityemail') }}">
                            City Email
                        </a>
                    </li>
                </ul>

                {{-- User-specific navigation links always displayed on the right-hand side of the navbar --}}
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu" role="menu">

                            <li>
                                <a href="{{ route('password.reset', ['token' => null]) }}">
                                    Change Password
                                </a>
                            </li>

                            @if (Auth::user()->hasRole($supervisor_role))
                                <li>
                                    <a href="{{ route('reports') }}">
                                        Reports
                                    </a>
                                </li>
                            @endif

                            <li role="separator" class="divider"></li>
                            
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul> <!-- .navbar-right -->
            </div><!-- .navbar-collapse -->
        </div><!-- .container-fluid -->
    @endif
</nav>