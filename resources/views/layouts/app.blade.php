<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ditaro</title>
	
	<!-- Favicon -->
	<link rel="apple-touch-icon" sizes="57x57" href="{{asset('/favicon')}}/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="{{asset('/favicon')}}/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="{{asset('/favicon')}}/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="{{asset('/favicon')}}/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="{{asset('/favicon')}}/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="{{asset('/favicon')}}/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="{{asset('/favicon')}}/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="{{asset('/favicon')}}/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="{{asset('/favicon')}}/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="{{asset('/favicon')}}/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="{{asset('/favicon')}}/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('/favicon')}}/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="{{asset('/favicon')}}/favicon-16x16.png">
	<link rel="manifest" href="{{asset('/favicon')}}/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{asset('/favicon')}}/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Favicon -->

    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="//cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <div id="wrap">
        <nav class="navbar navbar-default" id="header">
            <div class="container">
                <div class="navbar-header col-xs-6">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img id="logo" src="{{asset('/img/Ditaro_Logo_2B.PNG')}}" alt="Ditaro">
                        <div class="clearfix"></div>
                    </a>
                    
                </div>

                <div class="collapse navbar-collapse col-xs-6" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    {{-- <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Home</a></li>
                    </ul> --}}

 <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right float_right mtb_20">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Login</a></li>
                            {{-- <li><a href="{{ url('/register') }}">Register</a></li> --}}
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    @if(Auth::user()->hasRole('admin'))
                                        <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-tachometer float_left"></i>Admin Dashboard</a></li>
                                    @endif
                                    @if(Auth::user()->hasRole('admin'))
                                        <li><a href="{{ url('/user-add') }}"><i class="fa fa-btn fa-user float_left"></i>Create Property User</a></li>
                                    @endif
                                    @if(Auth::user()->hasRole('admin'))
                                        <li><a href="{{ url('/admin-user-add') }}"><i class="fa fa-btn fa-user float_left"></i>Create Admin User</a></li>
                                    @endif
                                    @if(Auth::user()->hasRole('admin'))
                                        <li><a href="{{ url('/import') }}"><i class="fa fa-btn fa-upload float_left"></i>Resident Import</a></li>
                                    @endif
                                    @if(!Auth::user()->hasRole('admin'))
                                        <li><a href="{{ url('/property') }}"><i class="fa fa-btn fa-tachometer float_left"></i>Property Dashboard</a></li>
                                    @endif
                                    @if(Auth::user()->hasRole('admin'))
                                        <li><a href="{{ url('/admin-upload') }}"><i class="fa fa-file float_left"></i>Upload Files</a></li>
                                        <li><a href="{{ url('/admin-uploads') }}"><i class="fa fa-file float_left"></i>All Files</a></li>
                                    @endif
                                    @if(!Auth::user()->hasRole('admin'))
                                        <li><a href="{{ url('/upload') }}"><i class="fa fa-file float_left"></i>Upload File</a></li>
                                        <li><a href="{{ url('/files') }}"><i class="fa fa-file float_left"></i>See Uploaded Files</a></li>
                                    @endif
                                    <li><a href="{{ url('/faqs') }}"><i class="fa fa-btn fa-question float_left"></i>FAQs</a></li>
                                    <li><a href="{{ url('/contacts') }}"><i class="fa fa-btn fa-phone float_left"></i>Contacts</a></li>
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out float_left"></i>Logout</a></li>
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="clear fix"></div>
        </nav>
        @yield('content')
    </div>
    <footer id="footer">
        <div class="container">
            <div class="col-sm-12">
                <img src="{{asset('/img/Ditaro_Logo_2W.png')}}">
                <a href="tel:8553501094"><i class="fa fa-phone"></i>888.784.6867</a>
                <a href="mailto:admin@ditaro.com"><i class="fa fa-envelope"></i>admin@ditaro.com</a>
            </div>
        </div>
    </footer>
    <!-- JavaScripts -->
    <script src="{{url('/')}}/js/all.js"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
