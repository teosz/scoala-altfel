<?php
$currentRoute = Route::getCurrentRoute()->getPath();
?>
<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<link rel="icon" type="image/png" href="assets/img/favicon.ico">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>Scoala altfel</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
		<meta name="viewport" content="width=device-width" />
		<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
		<link href="/assets/css/styles.css" rel="stylesheet" />
		<link href="/assets/css/app.css" rel="stylesheet" />
	</head>
	<body>
		<div class="wrapper">
			<div class="sidebar" data-color="red" data-image="assets/img/sidebar-4.jpg">
				<!--
					Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
					Tip 2: you can also add an image using data-image tag
					-->
				<div class="sidebar-wrapper">
					<div class="logo">
						<a href="http://www.creative-tim.com" class="simple-text">
						Scoala altfel
						</a>
					</div>
					<ul class="nav">
						<li class={{ $currentRoute == '/'  ? 'active' : '' }} >
							<a href="{{ url('/') }}">
								<i class="pe-7s-graph"></i>
								<p>Home</p>
							</a>
						</li>
						<li class={{ ($currentRoute == 'event')  ? 'active' : '' }} >
							<a href="{{ url('/event') }}">
								<i class="pe-7s-note2"></i>
								<p>Events</p>
							</a>
						</li>
						<li>
							<a href="user.html">
								<i class="pe-7s-user"></i>
								<p>My profile</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel">
				<nav class="navbar navbar-default navbar-fixed">
					<div class="container-fluid">
						<div class="navbar-header">
							<a class="navbar-brand"><?php echo ucfirst($currentRoute); ?></a>
						</div>
						<div class="collapse navbar-collapse">
							<ul class="nav navbar-nav navbar-left">
								@yield('navbar-left')
							</ul>
							<ul class="nav navbar-nav navbar-right">
								@yield('navbar-right')
								<li>
									<a href="">
									{{ Auth::user()->name }}
									</a>
								</li>
								<li>
									<a href="{{ url('/logout') }}">
									Log out
									</a>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<div class="content">
					@yield('content')
				</div>
				<footer class="footer">
					<div class="container-fluid">
						<p class="copyright pull-right">
						</p>
					</div>
				</footer>
			</div>
		</div>
	</body>
	<!--   Core JS Files   -->
	<script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>
	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>
	<!--  Notifications Plugin    -->
	<script src="assets/js/bootstrap-notify.js"></script>
	<!--  Google Maps Plugin    -->
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>
	<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>
	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		   	demo.initChartist();
		});
	</script>
</html>
