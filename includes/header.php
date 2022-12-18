<?php
include('includes/database.php');
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="title" content="Eventer">
        <meta name="description" content="An Online Event Management Company for the Organizations to Make Their Events Live">
        <meta name="keywords" content="about event management,about event manager,about us event management,about us events,about us for event management,an event management,an event manager,an event organizer,an online event,and events management,apa itu event managementas an event manager,as event management,as event organizer,delhi event management,event and management,event er,event event management,event management event,event management event management,event management in,event management in it,event management is,event management is a,event management is the,event management it,event management management,event management manager,event management online,event management organization,event management organizer,event management system,event management system online,event manager it,event online,event organization,event organizer is,event organizer management,event organizer manager,event organizer system,event organizers delhi,eventers event management,events in event management,events managed,for event management,in event managementmanaged event,management event organizernew event management,online event organization,paid events,the event management,the event organizer,us event management">
        <meta name="robots" content="index, follow">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="language" content="English">
        <meta name="revisit-after" content=" days">


		<title>Eventer - Online Event Management</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="css/slick.css"/>
		<link type="text/css" rel="stylesheet" href="css/slick-theme.css"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="css/nouislider.min.css"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="css/font-awesome.min.css">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="css/style.css"/>

		<link rel='shortcut icon' type='image/x-icon' href='img/logo.png' />

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-6JZ4STGRKR"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-6JZ4STGRKR');
</script>

    </head>
	<body>
		<!-- HEADER -->
		<header>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-envelope-o"></i> support@goeventer.in</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> Delhi G.T Road Phagwara Punjab 144411</a></li>
					</ul>
					<ul class="header-links pull-right">
						<li><a href="my-account.php"><i class="fa fa-user-o"></i> My Account</a></li>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="index.php" class="logo">
									<img src="./img/logo.png" alt="">
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<!--div class="col-md-6">
							<div class="header-search">
								<form action="#">
									<input class="input input-select" name="search" placeholder="Search here" required>
									<button class="search-btn" type="submit" name="submit">Search</button>
								</form>
							</div>
						</div-->
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								<!-- /Menu Toogle -->
							</div>
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- /HEADER -->

		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="active"><a href="index.php">Home</a></li>
						<li><a href="events.php">Events</a></li>
						<li><a href="about-us.php">About Us</a></li>
						<li><a href="contact-us.php">Contact Us</a></li>
						<li><a href="my-account.php">My Account</a></li>
						<li><a href="organizer-registrations.php">Organizer Registration</a></li>
						<li><a href="seller/index.php" target="_blank">Organizer Login</a></li>
				<?php
				if (isset($_SESSION['uId'])) {
						echo '<li><a href="logout.php">Logout</a></li>';
				}
				?>
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->