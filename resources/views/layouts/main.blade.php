<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    {{-- Bootstrap CSS --}}
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    {{-- Data Tables CSS --}}
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
    {{-- <link rel="stylesheet" href="css/all.min.css"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> --}}

     {{-- Font Awesome  --}}
     {{-- <script src="js/fontawesome.js"></script> --}}
     <script src="{{ asset('js/fontawesome.js') }}"></script>

     <livewire:styles />
    @stack('css')
</head>
<body>
    @include('layouts.navbar')
    <div class="container-fluid">
        <main>
            @yield('content')
        </main>
    </div>
    

    <livewire:scripts />
    {{-- JQuery  --}}
    <script src="{{ asset('js/jquery.js') }}"></script>
    {{-- Bootstrap --}}
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    {{-- Buat Fullscreen --}}
    <script src="{{ asset('js/fullscreen.js') }}"></script>
    {{-- ChartJS --}}
    <script src="{{ asset('js/chartjs.js') }}"></script>
    {{-- MomentJS --}}
    <script src="{{ asset('js/momentjs.js') }}"></script>
    {{-- ChartJS Adapter MomentJS --}}
    <script src="{{ asset('js/chartjs-adapter-moment.js') }}"></script>
    {{-- HammerJS --}}
    <script src="{{ asset('js/hammerjs.js') }}"></script>
    {{-- ChartJS Plugin Zoom --}}
    <script src="{{ asset('js/chartjs-plugin-zoom.js') }}"></script>
    {{-- Data Tables --}}
    <script src="{{ asset('js/datatables.min.js') }}"></script>
    {{-- Data Tables --}}
    {{-- <script src="{{ asset('js/dataTablesBootstrap.js') }}"></script> --}}
    {{-- <script src="{{ asset('js/dataTablesJquery.js') }}"></script> --}}
    {{-- data tables button JS --}}
    {{-- <script src="{{ asset('js/pdfmake.js') }}"></script> --}}
    {{-- VFS Fonts --}}
    {{-- <script src="{{ asset('js/vfsFonts.js') }}"></script> --}}
    {{-- Column Visability --}}
    {{-- <script src="{{ asset('js/colvis.js') }}"></script> --}}


    @stack('js')
</body>
<footer class="footer bg-white mt-2 ms-2">
    <strong>Toho Technology Indonesia &copy; 2012-2022.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0.0
    </div>
  </footer>
</html>