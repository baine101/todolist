<!-- Navigation -->
<nav>
    <div class="my-nav-wrapper">

        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col l3">
                <a class="navbar-brand" href="{{ url('/display') }}">Tasks</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="right hide-on-med-and-down">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    <li><a href="/taskadd">Add Task</a></li>
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ route('login') }}">Login</a></li>
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
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
                    @endif
                </ul>


            </div><!-- /.navbar-collapse -->

        </div>

    </div><!-- /.container-fluid -->

</nav>
