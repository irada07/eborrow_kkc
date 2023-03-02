<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ระบบบริหารจัดการวัสดุและครุภัณฑ์</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/c8ee3dd930.js"></script>
    

        <!-- Styles -->
        <style>
            /* html, body { */
                /* background-color: #fff;
                background-image: url('/img/walltest.png');
                background-size: cover;
                background-position:center;
                background-repeat: no-repeat;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200; */
                /* width:100%;
                height:auto; */
                /* margin: 0;
                padding: 0;
            } */

                /* img {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%); /* IE 9 */
                -webkit-transform: translate(-50%, -50%); /* Chrome, Safari, Opera */
            } */


            /* .full-height {
                height: 100vh;
            } */
/* 
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            } */

            /* .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            } */

            .m-b-md {
            margin-bottom: 30px;
            }

            .topnav {
            overflow: hidden;
            background-color: #333;
            }

            .topnav a {
            float: Right;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
            font-size: 20px;
            }

            .topnav a:hover {
            background-color: #ddd;
            color: black;
            }

            .topnav a.active {
            background-color: #04AA6D;
            color: white;
            }

            .responsive {
                width: 100%;
                height: auto;
                display: block;
              margin:auto;

            }

            @media only screen and (max-width: 600px) {
                   .visibledevice {margin-top:45%;}
            }

            body {
                font-family: 'Nunito', sans-serif;
                /* background-image: url('/img/bg.png'); */
                background: #f0f5f9;
                /* background-size: cover;
                background-position:center;
                background-repeat: no-repeat;
                margin: 0; */
                
                                
                }
             
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,800');

* {
	box-sizing: border-box;
}

.body1 {
	background: #f6f5f7;
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
	height: 500px;
	margin: 60px auto;
}

h1 {
	
	margin: 0;
}

h2 {
	text-align: center;
}

p {
	font-size: 14px;
	font-weight: 100;
	line-height: 20px;
	letter-spacing: 0.5px;
	margin: 20px 0 30px;
}

span {
	font-size: 12px;
}

/* a {
	color: #333;
	font-size: 14px;
	text-decoration: none;
	margin: 15px 0;
} */

button {
	border-radius: 20px;
	border: 1px solid #FF4B2B;
	background-color: #FF4B2B;
	color: #FFFFFF;
	font-size: 12px;
	font-weight: bold;
	padding: 12px 45px;
	letter-spacing: 1px;
	text-transform: uppercase;
	transition: transform 80ms ease-in;
}

button:active {
	transform: scale(0.95);
}

button:focus {
	outline: none;
}

button.ghost {
	background-color: transparent;
	border-color: #FFFFFF;
}

form {
	background-color: #FFFFFF;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 50px;
	height: 50%;
	text-align: center;
    margin: 8px 0;
}

input {
	background-color: #eee;
	border: none;
	padding: 12px 15px;
	margin: 8px 0;
	width: 100%;
}

.container {
	background-color: #fff;
	border-radius: 10px;
  	box-shadow: 0 14px 28px rgba(0,0,0,0.25), 
			0 10px 10px rgba(0,0,0,0.22);
	position: relative;
	overflow: hidden;
	width: 768px;
	max-width: 100%;
	min-height: 480px;
}

.form-container {
	position: absolute;
	top: 0;
	height: 100%;
	transition: all 0.6s ease-in-out;
}

.sign-in-container {
	left: 0;
	width: 50%;
	z-index: 2;
}

.container.right-panel-active .sign-in-container {
	transform: translateX(100%);
}

.sign-up-container {
	left: 0;
	width: 50%;
	opacity: 0;
	z-index: 1;
}

.container.right-panel-active .sign-up-container {
	transform: translateX(100%);
	opacity: 1;
	z-index: 5;
	animation: show 0.6s;
}

@keyframes show {
	0%, 49.99% {
		opacity: 0;
		z-index: 1;
	}
	
	50%, 100% {
		opacity: 1;
		z-index: 5;
	}
}

.overlay-container {
	position: absolute;
	top: 0;
	left: 50%;
	width: 50%;
	height: 100%;
	overflow: hidden;
	transition: transform 0.6s ease-in-out;
	z-index: 100;
}

.container.right-panel-active .overlay-container{
	transform: translateX(-100%);
}

.overlay {
	background : #FF416C ;
	background: -webkit-linear-gradient(to right, #F0FFFF, 	#6495ED);
	background: linear-gradient(to right, #F0FFFF, 	#6495ED);
	background-repeat: no-repeat;
	background-size: cover;
	background-position: center;
	color: black;
	position: relative;
	left: -100%;
	height: 100%;
	width: 200%;
  	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.container.right-panel-active .overlay {
  	transform: translateX(50%);
}

.overlay-panel {
	position: absolute;
	display: flex;
	align-items: center;
	justify-content: center;
	flex-direction: column;
	padding: 0 40px;
	text-align: center;
	top: 0;
	height: 100%;
	width: 50%;
	transform: translateX(0);
	transition: transform 0.6s ease-in-out;
}

.overlay-left {
	transform: translateX(-20%);
}

.container.right-panel-active .overlay-left {
	transform: translateX(0);
}

.overlay-right {
	right: 0;
	transform: translateX(0);
}

.container.right-panel-active .overlay-right {
	transform: translateX(20%);
}

.social-container {
	margin: 20px 0;
}

.social-container a {
	border: 1px solid #DDDDDD;
	border-radius: 50%;
	display: inline-flex;
	justify-content: center;
	align-items: center;
	margin: 0 5px;
	height: 40px;
	width: 40px;
}

.button2:hover {
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}

        </style>
    </head>
    <body>
        <div class="topnav">

            @auth
                <a href="{{ url('/home') }}">Home</a>
            @else
            
            &nbsp &nbsp <img class="align-middle" src="/img/header.png" alt="" width="170px" >
            
                <!-- <a href="{{ route('login') }}" class="btn bg-info text-white">Login</a> -->
                <!-- <a href="{{ route('loginSSO') }}" class="btn bg-info text-white">Login</a> -->
                {{-- @if (Route::has('register'))
                    <!-- <a href="{{ route('register') }}">Register</a> -->
                @endif --}}
            @endauth
        </div>
        <div class="body1">
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<h1>Create Account</h1>
			<div class="social-container">
			</div>
		</form>
	</div>
	<div class="form-container sign-in-container"><br>
		<form action="#">
        <img class="align-middle" src="/img/1.png" alt="" width="75px">
        <br>
			<h1>เข้าสู่ระบบ</h1>
            <br>
            <a href="{{ route('loginSSO') }}" class="btn bg-info btn-lg btn-block text-white button2" >Login</a>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-right">
            <img class="align-middle" src="/img/logo.png" alt="" width="350px">
            <br>
            <i class="fas fa-laptop-code fa-5x"></i>
            <br>
            <h1>ระบบบริหารจัดการวัสดุและครุภัณฑ์</h1>
				
			</div>
		</div>
	</div>
</div>
</div>


    
    <!-- <div class="wrapper">
        <div class="card">
        <div class="title text-center">
        <img class="align-middle" src="/img/logo.png" alt="" width="350px">
        <br>
        <br>
        <i class="fas fa-laptop-code fa-5x"></i>
        <br>
        <br>
            <h1>ระบบบริหารจัดการวัสดุและครุภัณฑ์</h1>
            <h2>Durable materials and inventories management system</h2>
        </div>
            <div class="content">
            <div class="circle"></div>
        </div>
    </div> -->


        <!-- <div class="container">
        <div class="row">
            <div class="col-1">
            </div>
            <div class="col-10">
                <div class="card bg-white text-center" style="border-radius:30px;margin-top:250px;opacity: 0.8">
                    <div class="card-body">
                        <h1 class="card-text" style="font-size:3vw;color: black">
                            <strong>ระบบบริหารจัดการวัสดุและครุภัณฑ์</strong>
                        </h1>
                        <p class="card-text" style="font-size:3vw;color: black">สาขาวิชาวิศวกรรมคอมพิวเตอร์</p>
                    </div>
                </div>
            </div>
        </div>
    </div> -->



    </body>
</html>
