<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Product') }} | @yield('title')</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('assets/admin/fontawesome-6.1.2/css/all.min.css') }}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('assets/admin/plugins/toastr/toastr.min.css') }}">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/dist/css/adminlte.min.css') }}">
    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('assets/admin/css/custom.css') }}">
    @yield('topRes')
</head>
<!--
`body` tag options:

    Apply one or more of the following classes to to the body tag
    to get the desired effect

    * sidebar-collapse
    * sidebar-mini
-->
<body class="hold-transition sidebar-mini">
    <div class="wrapper">        
        @include('admin.layouts.header')

        @include('admin.layouts.sidemenu')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')

        @include('admin.layouts.footer')
    </div>
    <!-- ./wrapper -->
    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('assets/admin/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/admin/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('assets/admin/dist/js/adminlte.min.js') }}"></script>
    <!-- Toastr -->
    <script src="{{ asset('assets/admin/plugins/toastr/toastr.min.js') }}"></script>
    <!-- Session message -->
    @if(Session::has('success') || Session::has('status'))
        <script>
            $(function() {
                $(document).Toasts('create', {
                    class: 'bg-success',
                    body: "{{ Session::get('success') }}",
                    title: 'Success',
                    autohide: true,
                    delay: 5000,
                    icon: 'fas fa-check fa-lg',
                });
            });
        </script>
    @elseif(Session::has('error'))
        <script>
            $(function() {
                $(document).Toasts('create', {
                    class: 'bg-danger',
                    body: "{{ Session::get('error') }}",
                    title: 'Error',
                    autohide: true,
                    delay: 5000,
                    icon: 'fas fa-exclamation-triangle fa-lg',
                });
            });
        </script>
    @elseif(Session::has('warning'))
        <script>
            $(function() {
                $(document).Toasts('create', {
                    class: 'bg-warning',
                    body: "{{ Session::get('warning') }}",
                    title: 'Warning',
                    autohide: true,
                    delay: 5000,
                    icon: 'fas fa-exclamation-triangle fa-lg',
                });
            });
        </script>
    @endif
    @yield('bottomRes')
</body>
</html>
