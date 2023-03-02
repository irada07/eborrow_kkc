<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจัดการวัสดุและครุภัณฑ์</title>
    <link rel="icon" type="image/x-icon" href="/img/2.png">


    <link rel="stylesheet" href="{!! asset('css/vendor.css') !!}" />
    <link rel="stylesheet" href="{!! asset('css/app.css') !!}" />

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/css/animate.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/plugins/datapicker/datepicker3.css" rel="stylesheet">
    <link href="/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">

    <link href="/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
    <link href="/css/plugins/dataTables/responsive.dataTables.min.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/dt-1.10.21/r-2.2.5/datatables.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.28.0/moment.min.js">
    <script src="https://kit.fontawesome.com/5122e741b4.js" crossorigin="anonymous"></script>




</head>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        @include('layouts.home.nav')

        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            @include('layouts.home.topnavbar')

            <!-- Main view  -->
            {{-- @yield('content') --}}
            <div class="wrapper wrapper-content">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @yield('content')
            </div>

            <!-- Footer -->
            @include('layouts.home.footer')

        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->

<script src="{!! asset('js/app.js') !!}" type="text/javascript"></script>

<!-- Mainly scripts -->
<script src="/js/jquery-3.1.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="/js/plugins/pace/pace.min.js"></script>

<!-- jQuery UI -->
<script src="/js/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="/js/jquery-number-2.1.6/jquery.number.min.js"></script>
<script src="/js/plugins/sweetalert/sweetalert.min.js"></script>

<script type="text/javascript" src="/js/plugins/dataTables/datatables.min.js"></script>
<script type="text/javascript" src="/js/plugins/dataTables/dataTables.responsive.min.js"></script>

{{-- <script type="text/javascript" src="https://cdn.datatables.net/v/bs/dt-1.10.21/r-2.2.5/datatables.min.js"></script> --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" ></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
$( "#admin" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/admin";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/admin";
        } else {
            location.href = "#";
        }
    }
});

$( "#admin-gborrow" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/admin/goods/borrow";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/admin/goods/borrow";
        } else {
            location.href = "#";
        }
    }
});

$( "#admin-ghistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/admin/goods/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/admin/goods/history";
        } else {
            location.href = "#";
        }
    }
});

$( "#admin-mborrow" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/admin/materials/borrow";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/admin/materials/borrow";
        } else {
            location.href = "#";
        }
    }
});

$( "#admin-mhistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/admin/materials/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/admin/materials/history";
        } else {
            location.href = "#";
        }
    }
});

$( "#admin-tborrow" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/admin/teaching-materials/borrow";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/admin/teaching-materials/borrow";
        } else {
            location.href = "#";
        }
    }
});

$( "#admin-thistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/admin/teaching-materials/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/admin/teaching-materials/history";
        } else {
            location.href = "#";
        }
    }
});

$( "#gmanage" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-goods";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-goods";
        } else {
            location.href = "#";
        }
    }
});

$( "#gapprove" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-goods/approve";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-goods/approve";
        } else {
            location.href = "#";
        }
    }
});


$( "#manage-ghistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-goods/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-goods/history";
        } else {
            location.href = "#";
        }
    }
});

$( "#m-manage" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-materials";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-materials";
        } else {
            location.href = "#";
        }
    }
});

$( "#m-approve" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-materials/approve";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-materials/approve";
        } else {
            location.href = "#";
        }
    }
});

$( "#manage-mhistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-materials/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-materials/history";
        } else {
            location.href = "#";
        }
    }
});

$( "#tm-manage" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-teaching-materials";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-teaching-materials";
        } else {
            location.href = "#";
        }
    }
});

$( "#tm-approve" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-teaching-materials/approve";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-teaching-materials/approve";
        } else {
            location.href = "#";
        }
    }
});

$( "#manage-tmhistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/manage-teaching-materials/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/manage-teaching-materials/history";
        } else {
            location.href = "#";
        }
    }
});

$( "#manageunit" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/generals/manage-units";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/generals/manage-units";
        } else {
            location.href = "#";
        }
    }
});

$( "#managedepartments" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/generals/manage-departments";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/generals/manage-departments";
        } else {
            location.href = "#";
        }
    }
});

$( "#managetypes" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/generals/manage-types";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/generals/manage-types";
        } else {
            location.href = "#";
        }
    }
});

$( "#manageshops" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/generals/manage-shops";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/generals/manage-shops";
        } else {
            location.href = "#";
        }
    }
});

$( "#greport" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/report/good";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/report/good";
        } else {
            location.href = "#";
        }
    }
});

$( "#mreport" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/report/material";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/report/material";
        } else {
            location.href = "#";
        }
    }
});

$( "#tmreport" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/report/teaching-material";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/report/teaching-material";
        } else {
            location.href = "#";
        }
    }
});

$( "#userapprove" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/access/approve";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/access/approve";
        } else {
            location.href = "#";
        }
    }
});

$( "#userall" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/access";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/access";
        } else {
            location.href = "#";
        }
    }
});

// user

$( "#home" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/home";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/home";
        } else {
            location.href = "#";
        }
    }
});

$( "#gborrow" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/goods/borrow";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/goods/borrow";
        } else {
            location.href = "#";
        }
    }
});

$( "#ghistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/goods/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/goods/history";
        } else {
            location.href = "#";
        }
    }
});

$( "#mborrow" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/materials/borrow";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/materials/borrow";
        } else {
            location.href = "#";
        }
    }
});

$( "#mhistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/materials/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/materials/history";
        } else {
            location.href = "#";
        }
    }
});

$( "#tborrow" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/teaching-materials/borrow";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/teaching-materials/borrow";
        } else {
            location.href = "#";
        }
    }
});

$( "#thistory" ).click(function() {
    if(sessionStorage.getItem("count") == 0){
        location.href = "/teaching-materials/history";
    }else{
        location.href = "#";
        if (confirm("มีรายการเบิกคงค้าง ต้องการออกจากหน้านี้หรือไม่?")) {
            location.href = "/teaching-materials/history";
        } else {
            location.href = "#";
        }
    }
});


 $( document ).ready(function() {
    $.get("/checkadmin", function(data){
        if(data.status == 1){
            countGoodApprove();
            countMatApprove();
            countTeachingMatApprove();
            countUserApprove();
        }
    });
});


function countGoodApprove(){

      $.post("/countGoodApprove", data = {
            _token: '{{ csrf_token() }}',
         },
            function (res) {
                console.log(res);
                $('.numGood').text(res);
            },
        );



}


function countMatApprove(){

      $.post("/countMatApprove", data = {
            _token: '{{ csrf_token() }}',
         },
            function (res) {
                console.log(res);
                $('.numMat').text(res);
            },
        );
}

function countTeachingMatApprove(){

      $.post("/countTeachingMatApprove", data = {
            _token: '{{ csrf_token() }}',
         },
            function (res) {
                console.log(res);
                $('.numTMat').text(res);
            },
        );
}

function countUserApprove(){

$.post("/countUserApprove", data = {
      _token: '{{ csrf_token() }}',
   },
      function (res) {
          console.log(res);
          $('.numUser').text(res);
      },
  );
}

</script>

@section('script')



{{-- https://service.eng.rmuti.ac.th/eng-login/logout/?id=10&secret=SAWASDEE&fbclid=IwAR30BH5y3HBdNbo3VKq4ECU8RJp38Zmx7DpT9fUpdEWRauSzsCPbrmsmCHo --}}
@show

</body>
</html>
