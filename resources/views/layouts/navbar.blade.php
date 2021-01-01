<!DOCTYPE html>
<html>
	<head>
		<title>YouChat</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">

		
		<!-- include  fichier style   -->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
		<!-- JAVASCRIPT -->
		
		<script src="{{ asset('js/jquery.min.js') }}"></script>
		<script src="{{ asset('js/popper.min.js') }}"></script>
		<script src="{{ asset('js/bootstrap-material-design.js') }}"></script>
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('uikit/js/uikit.js') }}"></script>
		<script src="{{ asset('uikit/js/uikit-icons.min.js') }}"></script>
		<script src="{{ asset('js/main.js') }}"></script>
    <!-- include  BOOTSTRAP   -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}"> -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/googlefonts.css') }}">
    
     <!-- include  UIKIT   -->
    <link rel="stylesheet" href="{{ asset('uikit/css/uikit.min.css') }}" />
    <link rel="stylesgeet" href="{{ asset('css/material-kit.css') }}">

	
    	{{-- <link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,400i,600|Montserrat:200,300,400" rel="stylesheet"> --}}
<!-- 
		<link rel="stylesheet" href="assets/css/bootstrap/bootstrap.css"> -->
		<link rel="stylesheet" href="{{ asset('fonts/fontawesome/css/font-awesome.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/helpers.css') }}">
		<link rel="stylesheet" href="{{ asset('css/style1.css') }}">
		<link rel="stylesheet" href="{{ asset('css/landing-2.css') }}">

	</head>
	<body data-spy="scroll" data-offset="200">


    <nav class="navbar navbar-expand-lg navbar-dark pb_navbar pb_scrolled-light" >
    	<div class="container">
			<!-- Logo -->
			<a class="navbar-brand" href="{{ url('/') }}">
			
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='#fff' version="1.1" id="" x="3px" y="0px" viewBox="0 0 46 46" enable-background="new 0 0 46 46" xml:space="preserve" class="injected-svg mx-auto fill-primary" style="height: 46px;">
				<polygon opacity="0.7" points="45,11 36,11 35.5,1 "></polygon>
				<polygon points="35.5,1 25.4,14.1 39,21 "></polygon>
				<polygon opacity="0.4" points="17,9.8 39,21 17,26 "></polygon>
				<polygon opacity="0.7" points="2,12 17,26 17,9.8 "></polygon>
				<polygon opacity="0.7" points="17,26 39,21 28,36 "></polygon>
				<polygon points="28,36 4.5,44 17,26 "></polygon>
				<polygon points="17,26 1,26 10.8,20.1 "></polygon>
			</svg>
			</a>
			<!-- Logo -->

			<!-- Login Join -->
			<div class="collapse navbar-collapse uk-visible@m" >
				<ul class="navbar-nav ml-auto">

					<!--login link-->
					<li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Login</a></li>
					<!--login link-->

					<!--register link-->
					<li class="nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0"><a class="nav-link" href="{{ route('register') }}" ><span class="pb_rounded-4 px-4">Join</span></a></li>
					<!--register link-->
				
				</ul>

			</div>
			<!-- Login Join -->

			<!-- MENU -->
			<div class="uk-navbar-right uk-hidden@m uk-inline">
				<a class="uk-navbar-toggle text-white "type="button">
					<span uk-navbar-toggle-icon></span>
				</a>
				<div uk-dropdown="mode: click" class="p-0">
					<ul class="navbar-nav bg-dark p-2 align-items-center ">

						<!--login link-->
						<li class="nav-item"><a class="nav-link" href="{{ url('/') }}">Login</a></li>
						<!--login link-->
	
						<!--register link-->
						<li class="nav-item cta-btn ml-xl-2 ml-lg-2 ml-md-0 ml-sm-0 ml-0"><a class="nav-link" href="{{ route('register') }}" ><span class="pb_rounded-4 px-4">Join</span></a></li>
						<!--register link-->
					
					</ul>
				</div>

			</div>
			<!-- MENU -->

    	</div>
    </nav>
    <!-- END nav -->


		

	@yield('content')

	<footer class="pb_footer bg-light" role="contentinfo">
	<div class="container">
		<div class="row text-center">
		<div class="col">
			<ul class="list-inline">
			<li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-facebook"></i></a></li>
			<li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-twitter"></i></a></li>
			<li class="list-inline-item"><a href="#" class="p-2"><i class="fa fa-linkedin"></i></a></li>
			</ul>
		</div>
		</div>
		<div class="row">
		<div class="col text-center">
			<p class="pb_font-14">&copy; 2020. All Rights Reserved. <br>  </p>
			
		</div>
		</div>
	</div>
	</footer>
		<!--
		<script src="assets/js/slick.min.js"></script>
		<script src="assets/js/jquery.mb.YTPlayer.min.js"></script>

		<script src="assets/js/jquery.waypoints.min.js"></script>
		
		<script src="assets/js/jquery.easing.1.3.js"></script>

		<script src="assets/js/main.js"></script>  -->
	</body>
</html>

{{-- <!DOCTYPE html>
<html>
<head>
	<title>YouChat</title>
	<meta charset="utf-8" lang="en">
	<!-- include  BOOTSTRAP   -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
	
	<!-- include  fichier style   -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
	<!-- include  UIKIT   -->
	<link rel="stylesheet" href="{{ asset('uikit/css/uikit.min.css') }}" />
    <script src="{{ asset('uikit/js/uikit.min.js') }}"></script>
    <script src="{{ asset('uikit/js/uikit-icons.min.js') }}"></script>
</head>


<body class="uk-background-fixed uk-background-image@m 	">

<!-- uk-thumbnav uk-thumbnav-vertical" uk-margin-->
<!-- navbar -->
	<nav class="fixed-top navbar navbar-white bg-white">
		<!--YouChat Logo -->
			<a class="navbar-brand uk-logo  text-danger"  href="{{ url('/') }}">
			  
			<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill='#dc3545' version="1.1" id="" x="3px" y="0px" viewBox="0 0 46 46" enable-background="new 0 0 46 46" xml:space="preserve" class="injected-svg mx-auto fill-primary" style="height: 46px;">
				<polygon opacity="0.7" points="45,11 36,11 35.5,1 "></polygon>
				<polygon points="35.5,1 25.4,14.1 39,21 "></polygon>
				<polygon opacity="0.4" points="17,9.8 39,21 17,26 "></polygon>
				<polygon opacity="0.7" points="2,12 17,26 17,9.8 "></polygon>
				<polygon opacity="0.7" points="17,26 39,21 28,36 "></polygon>
				<polygon points="28,36 4.5,44 17,26 "></polygon>
				<polygon points="17,26 1,26 10.8,20.1 "></polygon>
			</svg>
			YouChat
			</a>

		<!-- login or sign in-->
			<form class="form-inline uk-navbar-right uk-visible@m">
			   <!--sign in button -->
			    <a class="uk-margin-small-right	"href="{{ url('register') }}">
			    	<button class="btn btn-md btn-outline-danger my-2 my-sm-0" style="width: 100px;"type="button"> Join</button>
			    </a>
				 <!--log in button -->
			    <a href="{{ url('/') }}">
			    	<button class="btn btn-sm bg-white my-2 my-sm-0" type="button">Login</button>
			    </a>

			</form>
			
			<!--MENU-->
			<div class="uk-navbar-right uk-hidden@m">
				<a class="uk-navbar-toggle text-danger" href="#">
					<span uk-navbar-toggle-icon></span>
				</a>
			</div>
	</nav>
	<hr/>

</html> --}}