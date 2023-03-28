<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Font & Icon -->
    <!-- Font & Icon -->
    <link href="{{ asset('assetsAdmin/font/roboto.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsAdmin/font/roboto-condensed.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assetsAdmin/plugins/material-design-icons-iconfont/material-design-icons.min.css') }}"
        rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('assetsAdmin/plugins/fontawesome-free/css/all.min.css') }}">
    {{-- <link href="{{ asset('../../plugins/fontawesome-free/css/all.min.css') }}" rel="stylesheet"> --}}

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assetsAdmin/plugins/jqvmap/jqvmap.min.css') }}">
      <!-- Plugins flatpickr-->
  <link rel="stylesheet" href="{{ asset('assetsAdmin/plugins/flatpickr/flatpickr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsAdmin/plugins/flatpickr/plugins/monthSelect/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assetsAdmin/plugins/clockpicker/bootstrap-clockpicker.min.css') }}">
    <!-- styles notification -->
    <link rel="stylesheet" href="{{ asset('assetsAdmin/plugins/noty/noty.min.css') }}">
   <!-- Plugins -->
   <link rel="stylesheet" href="{{ asset('assetsAdmin/plugins/summernote/summernote-bs4.css') }}">


    <!-- Main Style -->
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/style.min.css') }}" id="main-css">
    <link rel="stylesheet" href="{{ asset('assetsAdmin/css/sidebar-blue.min.css') }}" id="sidebar-css">
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"> --}}
    <!-- Plugins messages-->
    <link rel="stylesheet" href="{{ asset('assetsAdmin/plugins/summernote/summernote-bs4.css') }}">
    <!--boxicon link-->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">   --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script>  --}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <style>
        .hidden{
            display: none;
        }
        @media screen and (max-width:768px){
            .deranger{
                width:100%;
                display:flex;
            }
        }
        @media screen and (max-width:400px){
            .deranger{
                margin:0px;
                width:100%;
                /* display:grid; */
            }
        }
        /* @media screen and (max-width:1235px){
            .blocdeux{
                margin:0px;
                width:100%; 
                display:block;
                display:inline;
            }
        } */

    </style>

    <title>BluePush</title>
</head>

<body>
    <!-- Sidebar -->

    @include('partials.sidebarAdmin')

    <!-- /Sidebar -->

    <!-- Main -->
    <div class="main">

        <!-- Main header -->
        @include('partials.headerAdmin')
        <!-- /Main header -->

            {{-- flas message --}}
            {{-- @include('flash::message') --}}

        <!-- Main body -->
        @yield('content')
        <!-- /Main body -->

    </div>
    <!-- /Main -->

    <!-- Search Modal -->
    {{-- @include('partials.search_modal') --}}
    <!-- /Search Modal -->

    <!-- Chat Modal -->
    {{-- @include('partials.chat_modal') --}}
    <!-- /Chat Modal -->


    @include('partials.scriptAdmin')

    {{-- les script de Julio et Christtophe --}}
    {{-- @include('partials.external_script') --}}
    @include('partials.writtenJQuery')


    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
    {{-- <script src="{{ asset('js/scriptloic.js') }}"></script> --}}
    @include('partials.scriptsLoic')

</body>

</html>
