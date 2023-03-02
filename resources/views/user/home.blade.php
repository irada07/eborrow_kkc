{{-- @extends('layouts.auth.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}

@extends('layouts.home.app')

@section('title', 'Main page')

@section('content')
<div class="main-body">
      
      <div class="promo_card text-center">
        <h1>ยินดีต้อนรับเข้าสู่ ระบบบริหารจัดการวัสดุและครุภัณฑ์</h1>
        <!-- <span>Lorem ipsum dolor sit amet.</span><br> -->
        <div class="responsive" width="600" height="400"></div>
      </div>
      </div>
      <div class="main-body1">
      <div class="promo_card1 text-center">
      
      <img src="/img/logo.png" class="responsive1">
            <div class="row">
                <div class="column">
                <div class="card">
                <img src="/img/testimg.png" class="responsive1">
                </div>
            </div>

            <div class="column">
                <div class="card">
                <img src="/img/testimg1.png" class="responsive1">
                </div>
            </div>
     
      </div>
      </div>
@endsection

@section('script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" ></script> --}}
<style>
    .main-body{
  width: 100%;
  padding: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  
}
.main-body1{
  width: 100%;
  padding: 1rem;
  display: flex;
  align-items: center;
  justify-content: center;
  
}
.promo_card{
  width: 70%;
  color: black;
  margin-top: 10px;
  border-radius: 8px;
  border-style : solid;
  border-color : black;
  padding: 0.5rem 1rem 1rem 1rem;
  background-image: url('/img/walltest.png');
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
.promo_card1{
  width: 70%;
  color: black;
  margin-top: 1px;
  border-radius: 8px;
  border-style : solid;
  border-color : black;
  padding: 0.5rem 1rem 1rem 1rem;
  background : #FFEBCD;
}
.promo_card h1, .promo_card span, button{
  margin: 10px;
}
.promo_card button{
  display: block;
  padding: 6px 12px;
  border-radius: 5px;
  cursor: pointer;
}
.responsive {
    max-width: 100%;
  height: auto;
  border-radius: 8px;
}
.responsive1 {
    max-width: 100%;
  height: auto;
  border-radius: 8px;
}
.column {
  float: left;
  width: 50%;
  padding: 0 10px;
}

/* Remove extra left and right margins, due to padding */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive columns */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  padding: 16px;
  text-align: center;
  border-radius: 8px;
}
</style>

<script>
$("textstatus").ready(function(){
  sessionStorage.setItem("count", 0);
    $.get("checkstatus", function(data){
        if(data.status == 2){
            alert("หมายเหตุ: " + data.data);
        }
        if(data.status == 0){
            alert("หมายเหตุ: " + data.data);
        }
        // document.getElementById("textstatus").innerHTML = data.data;
    });
});
    window.ex_count = 0;
</script>
@stop

