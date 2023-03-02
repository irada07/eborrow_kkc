<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECP - @yield('title') </title>


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    {{-- <link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet"> --}}
    <link href="/css/plugins/dataTables/responsive.dataTables.min.css" rel="stylesheet">

    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.21/r-2.2.5/datatables.min.css"/> --}}
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js"> --}}
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css" />


    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css" rel="stylesheet"/> --}}


    <style>
        .content-center {
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);

            padding: 10px;
        }

        .fix-center {
            position: fixed;
            top: 50%;
            left: 50%;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body>




    <div class="wrapper wrapper-content fix-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-3"></div>
                <div class="col-lg-3">
                    <a href="{{ route('loginSSO') }}">
                    <div class="ibox ">
                        <div class="ibox-title" style="border-radius: 1.5rem 1.5rem 0 0">
                            <div class="ibox-tools">
                                {{-- <span class="label label-success float-right">**</span> --}}
                            </div>
                            <h5><i class="fa fa-paper-plane-o fa-5 text-navy"></i></h5>
                        </div>
                         <div class="ibox-content" style="border-radius: 0 0 1.5rem 1.5rem">
                            <h1 class="no-margins">SSO Login</h1>
                            <small>Click to login</small>
                            <h2 class="text-right text-navy"><i class="fa fa-sign-in fa-5" aria-hidden="true"></i></h2>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3" style="border-radius: 1.5rem;">
                    <a href="{{ route('login') }}">
                    <div class="ibox" >
                        <div class="ibox-title" style="border-radius: 1.5rem 1.5rem 0 0">
                            <div class="ibox-tools">
                                {{-- <span class="label label-info float-right">Admin Login</span> --}}
                            </div>
                            <h5><i class="fa fa-paper-plane-o fa-5 text-warning"></i></h5>
                        </div>
                        <div class="ibox-content" style="border-radius: 0 0 1.5rem 1.5rem">
                            <h1 class="no-margins text-default">Admin Login</h1>
                            <small>Click to login</small>
                            <h2 class="text-right text-warning"><i class="fa fa-sign-in fa-5" aria-hidden="true"></i></h2>
                            {{-- <div class="stat-percent font-bold text-info"><i class="fa fa-sign-in fa-5" aria-hidden="true"></i> </div>
                            <small>Click to login</small> --}}
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-lg-3"></div>
            </div>
        </div>

    </div>



</body>

</html>
