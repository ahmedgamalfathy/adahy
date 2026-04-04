<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="format-detection" content="telephone=no">
    @php $theme1 = "theme1"; @endphp
    <title>Islah : @yield('title', 'إدارة الخزائن')</title>
    <link rel="shortcut icon" type="image/png" href="/{{$theme1}}/images/favicon.png" />
    <link href="/{{$theme1}}/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="/{{$theme1}}/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
    <link rel="stylesheet" href="/{{$theme1}}/vendor/nouislider/nouislider.min.css">
    <link href="/{{$theme1}}/css/style.css" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="preloader">
        <div class="waviy">
            <span style="--i:1">L</span><span style="--i:2">o</span><span style="--i:3">a</span>
            <span style="--i:4">d</span><span style="--i:5">i</span><span style="--i:6">n</span>
            <span style="--i:7">g</span><span style="--i:8">.</span><span style="--i:9">.</span><span style="--i:10">.</span>
        </div>
    </div>

    <div id="main-wrapper">
        @include('layouts.nav_header')
        @include('layouts.chatbox')
        @include('layouts.header')
        @include('layouts.sidebar')

        <div class="content-body">
            <div class="container-fluid">
                <div class="row layout-top-spacing" id="cancel-row">

                    @if(session()->has('sucess'))
                        <div class="alert alert-success" style="font-size:18px;font-weight:bold;">
                            <p style="color:#000">{{ session('sucess') }}</p>
                        </div>
                    @endif
                    @if(session()->has('success'))
                        <div class="alert alert-success" style="font-size:18px;font-weight:bold;">
                            <p style="color:#000">{{ session('success') }}</p>
                        </div>
                    @endif
                    @if(session()->has('fail'))
                        <div class="alert alert-danger" style="font-size:18px;font-weight:bold;">
                            <p>{{ session('fail') }}</p>
                        </div>
                    @endif

                    @yield('content')

                </div>
            </div>
        </div>
    </div>

    <script src="/{{$theme1}}/vendor/global/global.min.js"></script>
    <script src="/{{$theme1}}/vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="/{{$theme1}}/vendor/jquery-nice-select/js/jquery.nice.select.min.js"></script>
    <script src="/{{$theme1}}/vendor/apexchart/apexchart.js"></script>
    <script src="/{{$theme1}}/js/custom.min.js"></script>
    <script src="/{{$theme1}}/js/dlabnav-init.js"></script>
    @stack('scripts')
</body>
</html>
