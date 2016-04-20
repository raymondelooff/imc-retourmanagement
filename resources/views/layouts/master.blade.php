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
                            <ul class="nav navbar-nav navbar-right">
                                @include(config('laravel-menu.views.bootstrap-items'), array('items' => $menu->roots()))
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
        <script src="{{ asset('/bower_components/bootstrap-sass/assets/javascripts/bootstrap.min.js') }}"></script>
        <script src="{{ asset('/bower_components/moment/min/moment-with-locales.min.js') }}"></script>
        <script src="{{ asset('/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('/js/app.js') }}"></script>
        @yield('scripts')

    </body>
</html>