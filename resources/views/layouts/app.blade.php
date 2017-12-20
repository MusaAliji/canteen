<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <script>
        window.laravel = {!! json_encode([
        'csrfToen' => csrf_token(),
        ])!!}
    </script>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    @guest

                        @else

                    @if(auth()->user()->hasRole('canteener'))
                        <a class="navbar-brand" href="{{ url('/canteen') }}">
                            Canteen
                        </a>
                        <a class="navbar-brand" href="{{ url('/orders') }}">
                            My Orders
                        </a>
                    @elseif(auth()->user()->hasAnyRole(['admin','user']))
                        <a class="navbar-brand" href="{{ url('/canteens') }}">
                            Canteen
                        </a>
                    @endif
                    @if(auth()->user()->hasRole('admin'))
                    <a class="navbar-brand" href="{{ url('/products') }}">
                        Products
                    </a>
                    <a class="navbar-brand" href="{{ url('/degrees') }}">
                        Degrees
                    </a>
                    <a class="navbar-brand" href="{{ url('/kinds') }}">
                        Kinds
                    </a>
                    <a class="navbar-brand" href="{{ url('/departments') }}">
                        Departments
                    </a>
                    <a class="navbar-brand" href="{{ url('/rooms') }}">
                        Rooms
                    </a>
                    <a class="navbar-brand" href="{{ url('/users') }}">
                        Users
                    </a>
                    @endif
                    @if(auth()->user()->hasRole('user'))
                        <a class="navbar-brand" href="{{ url('/profile') }}">
                            My profile
                        </a>
                        @endif
                        @endguest
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-fw fa-bell"></i>
                                <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
                                <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">New Alerts:</h6>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
                                    <span class="small float-right text-muted">11:21 AM</span>
                                    <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
                                    <span class="small float-right text-muted">11:21 AM</span>
                                    <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
                                    <span class="small float-right text-muted">11:21 AM</span>
                                    <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item small" href="#">View all alerts</a>
                            </div>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
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
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div id="app">
        @yield('content')
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
