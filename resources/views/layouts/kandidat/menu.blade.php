<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{url('image/yayasan.png')}}" type="image/png">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Yayasan - Gita Cahaya Karsa Putri Pasundan </title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    
    <!-- CSS Files -->
    <link href="{{url('assets/css/bootstrap.min.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{url('assets/css/now-ui-dashboard.css?v=1.0.1')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    {{-- <link href="{{url('assets/demo/demo.css')}}" rel="stylesheet" /> --}}
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="blue">
            <div class="logo">
                <a href="/" class="d-flex p-3 link-white text-decoration-none sidebar-title " title="Icon-only">
                    <img src="{{ url('image/icons/dashboard.png') }}" alt="" class="me-2" style="width: 24px; height: 24px;">
                    <p class="fw-normal text-white mb-0">{{ Auth::user()->name }}</p>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav nav-pills nav-flush flex-column mb-auto">
                    <li class="{{ (Route::is('kandidat.dashboard')) ? 'list-active' : ''}}">
                        <a href="{{route('kandidat.dashboard')}}" class="d-flex align-items-center">
                            <img src="{{ url('image/icons/dashboard.png') }}" alt="" class="ml-2" style="width: 24px; height: 24px;">
                            <p class=" ml-3 fw-bold" >Dashboard</p>
                        </a>
                    </li>
                    <li class="{{ (Route::is('kandidat.daftar')) ? 'list-active' : ''}}">
                        <a href="{{route('kandidat.daftar')}}" class="d-flex align-items-center">
                            <img src="{{ url('image/icons/hire-white.png') }}" alt="" class="ml-2" style="width: 24px; height: 24px;">
                            <p class=" ml-3 fw-bold" >Pendaftaran</p>
                        </a>
                    </li>
                    <li class="">
                        <a href="" class="d-flex align-items-center">
                            <img src="{{ url('image/icons/vote.png') }}" alt="" class="ml-2" style="width: 24px; height: 24px;">
                            <p class=" ml-3 fw-bold" > Vote</p>
                        </a>
                    </li>
                    <li class="">
                        <a class="d-flex align-items-center" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <img src="{{ url('image/icons/logout (2).png') }}" alt="" class="ml-2" style="width: 24px; height: 24px;">
                        <p class=" ml-3 fw-bold" >Log-Out</p>
                        </a>
                        <div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        
        @yield('content')
        @include('sweetalert::alert')

    </div>
</body>
<!--   Core JS Files   -->
<script src="{{url('assets/js/core/jquery.min.js')}}"></script>
<script src="{{url('assets/js/core/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
<!--  Google Maps Plugin    -->
<!-- Chart JS -->
<script src="{{url('assets/js/plugins/chartjs.min.js')}}"></script>
<script src="{{url('js/bootstrap.min.css')}}"></script>
<!--  Notifications Plugin    -->
<script src="{{url('assets/js/plugins/bootstrap-notify.js')}}"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{url('assets/js/now-ui-dashboard.js?v=1.0.1')}}"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
{{-- <script src="{{url('assets/demo/demo.js')}}"></script> --}}
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();
    });
</script>

</html>
