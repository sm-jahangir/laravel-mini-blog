<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome-free/css/all.min.css">

    {{-- DataTables --}}
    <link rel="stylesheet" href="{{asset('backend/custom/datatables/jquery.dataTables.min.css')}}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
</head>

<body class="hold-transition sidebar-mini">
    <div id="app" class="wrapper">

        <!-- Navbar -->
        <x-backend.header-component />
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <x-backend.sidebar-component />

        <!-- Content Wrapper. Contains page content -->
        @yield('BackendMainContent')
        <!-- /.content-wrapper -->

        <x-backend.footer-component />
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    {{-- DataTables Js --}}
    <script src="{{asset('backend/custom/datatables/jquery.dataTables.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('backend')}}/dist/js/adminlte.min.js"></script>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    @stack('js')
</body>

</html>
