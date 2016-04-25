<!DOCTYPE html>
<html>
    <head>
        {{-- Meta --}}
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <base href="/">

        {{-- Title --}}
        <title>IMC Retourmanagement - @yield('title')</title>

        {{-- Stylesheets --}}
        <link rel="stylesheet" type="text/css" href="{{ asset('/bower_components/font-awesome/css/font-awesome.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/screen.css') }}">
        @yield('stylesheets')

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>

        <!-- Wrapper -->
        <div id="wrapper">

            <!-- Header -->
            <header id="header">
                <!-- Navigation -->
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        {{-- Navbar header --}}
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-target" aria-expanded="false">
                                <span class="sr-only">{{ trans('base.toggle-navigation') }}</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <span>IMC Retourmanagement</span>
                            </a>
                        </div>

                        {{-- Navbar content --}}
                        <div class="collapse navbar-collapse" id="navbar-collapse-target">
                            <ul class="nav navbar-nav">
                                @include(config('laravel-menu.views.bootstrap-items'), array('items' => $menu->roots()))
                            </ul>
                            <ul class="nav navbar-nav navbar-right">
                                @if(Auth::check())
                                    <li class="dropdown">
                                        <a href="{{ route('account.index') }}" class="dropdown-toggle dropdown-profile" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ Gravatar::src(Auth::user()->email, 80) }}" class="avatar"> {{ Auth::user()->name }} <span class="caret"></span></a>
                                        <ul class="dropdown-menu">
                                            <li><a href="{{ route('account.edit') }}">Account wijzigen</a></li>
                                            <li><a href="{{ route('account.email.edit') }}">E-mailadres wijzigen</a></li>
                                            <li><a href="{{ route('account.password.edit') }}">Wachtwoord wijzigen</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="{{ route('logout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Uitloggen</a></li>
                                @else
                                    <li><a href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Inloggen</a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </nav>

                <!-- Page header -->
                <div class="container">
                    <div class="container-inner">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1>@yield('title')</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Content -->
            <section id="content">
                <div class="container">
                    <div class="container-inner">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (Session::has('flash_notification.message'))
                            <div class="alert alert-{{ Session::get('flash_notification.level') }}">
                                {{ Session::get('flash_notification.message') }}
                            </div>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </section>

            <!-- Footer pusher -->
            <div id="footer-pusher"></div>

        </div>

        <!-- Footer -->
        <footer>
            <div class="container">
                <span class="pull-right">&copy; IMC Retourmanagement {{ Carbon\Carbon::now()->year }}</span>
            </div>
        </footer>

        <!-- Scripts -->
        <script src="{{ asset('/bower_components/jquery/dist/jquery.min.js') }}"></script>
        <script src="{{ asset('/bower_components/moment/min/moment-with-locales.min.js') }}"></script>
        <script src="{{ asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
        @yield('scripts')

    </body>
</html>