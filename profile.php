<?php
session_start();
include('connection.php');
if(!isset($_SESSION['username']))
{
	header('Location:login.php');
}
$q = "SELECT * FROM Appointment ORDER BY date DESC";
$r = mysqli_query($dbc, $q);

$q2 = "SELECT * FROM Feedback ORDER BY id DESC";
$r2 =  mysqli_query($dbc, $q2);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Doctor Login</title>
	<!--/metadata -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">
	<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

<link href="//fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
<!--//fonts-->

</head>

<body>

	<div class="banner-header banner2">
		<div class="banner-dott1">
			<!--header-->
			<div class="header">
				<div class="container-fluid">
					<nav class="navbar navbar-default">
						<div class="navbar-header navbar-left">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="w3_navigation_pos">
								<h1><a href="index.php">MediBulk</a></h1>
							</div>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
							<nav>
								<ul class="nav navbar-nav">
									<li><a href="index.php">Home</a></li>
									<li><a href="about.html">About Us</a></li>
									<li><a href="services.html">Our Services</a></li>
									<li><a href="gallery.php">Gallery</a></li>
									<li><a href="contact.php">Contact</a></li>
									<li><a href="logout.php">Logout</a></li>
								</ul>
							</nav>
						</div>
					</nav>
				</div>
			</div>
			<!--//header-->
		</div>
	</div>
	<!-- // banner -->
	<!-- typography -->
	<div class="typography">
		<div class="container">
			<div class="grid_3 grid_4">
				<h3 class="hdg">Doctor Profile</h3>
				<!-- <div class="col-md-4">
					<form action="doctorloginprocess.php" method="post">
						<div class="form-group">
							<label for="username">Doctor Id:</label>
							<input type="text" name="username" class="form-control">
						</div>
						<div class="form-group">
							<label for="password">Password:</label>
							<input type="password" name="password" class="form-control" id="password">
						</div>
						<button type="submit" class="btn btn-default">Submit</button>
					</form>
				</div> -->
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Appointments</a></li>
						<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Feedbacks</a></li>
						<li role="presentation"><a href="#photos" role="tab" id="photos-tab" data-toggle="tab" aria-controls="photos">Upload Photos</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Phone</th>
										<th>Date</th>
										<th>Type</th>
									</tr>
								</thead>
								<tbody>
									<?php while($appointment= mysqli_fetch_assoc($r)){ ?>
									<tr>
										<td><?php echo $appointment['name']; ?></td>
										<td><?php echo $appointment['email']; ?></td>
										<td><?php echo $appointment['phone']; ?></td>
										<td><?php echo $appointment['date']; ?></td>
										<td><?php echo $appointment['type']; ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
							<table class="table table-striped">
								<thead>
									<tr>
										<th>Name</th>
										<th>Email</th>
										<th>Message</th>
									</tr>
								</thead>
								<tbody>
									<?php while($feedback= mysqli_fetch_assoc($r2)){ ?>
									<tr>
										<td><?php echo $feedback['name']; ?></td>
										<td><?php echo $feedback['email']; ?></td>
										<td><?php echo $feedback['message']; ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
						</div>
						<div role="tabpanel" class="tab-pane fade" id="photos" aria-labelledby="photos-tab">
							<form method="post" action="upload.php" enctype='multipart/form-data'>
								<div class="form-group">
									<label for="file">Image Upload:</label>
									<input type="file" name="file" class="form-control" id="file">
								</div>
								<button type="submit" value='Upload' name='but_upload' class="btn btn-default">Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- //typography -->
	<!-- footer -->
	<div class="footer">
		<div class="container">
			<div class="footer_agile_inner_info_w3l">
				<div class="col-md-4 footer-left">
					<h2><a href="index.php">E-SERVICES </a></h2>
					<p>Lorem ipsum quia dolor
						sit amet, consectetur, adipisci velit, sed quia non
					numquam eius modi tempora.</p>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social two">
						<li><a href="#" class="facebook">
							<div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
							<div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
							<li><a href="#" class="twitter">
								<div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
								<div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
								<li><a href="#" class="instagram">
									<div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
									<div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
									<li><a href="#" class="pinterest">
										<div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
										<div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
									</ul>
								</div>
								<div class="col-md-4 footer-right">
									<div class="sign-grds">
										<div class="sign-gd">
											<h4>Information </h4>
											<ul>
												<li><a href="index.php" class="active">Home</a></li>
												<li><a href="about.html" >About</a></li>
												<li><a href="services.html"> Services</a></li>
												<li><a href="gallery.php">Portfolio</a></li>
												<li><a href="contact.php">Contact</a></li>

											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-4 sign-gd-two">
									<h4>Address</h4>
									<div class="w3-address">
										<div class="w3-address-grid">
											<div class="w3-address-left">
												<i class="fa fa-phone" aria-hidden="true"></i>
											</div>
											<div class="w3-address-right">
												<h6>Phone Number</h6>
												<p>+1 234 567 8901</p>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="w3-address-grid">
											<div class="w3-address-left">
												<i class="fa fa-envelope" aria-hidden="true"></i>
											</div>
											<div class="w3-address-right">
												<h6>Email Address</h6>
												<p>Email :<a href="mailto:example@email.com"> mail@example.com</a></p>
											</div>
											<div class="clearfix"> </div>
										</div>
										<div class="w3-address-grid">
											<div class="w3-address-left">
												<i class="fa fa-map-marker" aria-hidden="true"></i>
											</div>
											<div class="w3-address-right">
												<h6>Location</h6>
												<p>Broome St, NY 10002,California, USA.

												</p>
											</div>

										</div>
									</div>
								</div>
								<div class="clearfix"> </div>


								<div class="clearfix"></div>

								<p class="copy-right">&copy;2018 MediBulk. All rights reserved | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
							</div>
						</div>
					</div>
					<!-- //footer -->

					<script type="text/javascript" src="js/jquery-2.1.4.min.js"></script>
					<!-- //Tour-Locations-JavaScript -->
					<script src="js/SmoothScroll.min.js"></script>
					<!-- smooth scrolling-bottom-to-top -->
					<script type="text/javascript">
						$(document).ready(function() {
					/*
						var defaults = {
						containerID: 'toTop', // fading element id
						containerHoverID: 'toTopHover', // fading element hover id
						scrollSpeed: 1200,
						easingType: 'linear'
						};
						*/
						$().UItoTop({ easingType: 'easeOutQuart' });
					});
				</script>
				<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
				<!-- //smooth scrolling-bottom-to-top -->
				<script type="text/javascript">
					jQuery(document).ready(function($) {
						$(".scroll").click(function(event){
							event.preventDefault();
							$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
						});
					});
				</script>
				<!-- start-smoth-scrolling -->
				<script type="text/javascript" src="js/move-top.js"></script>
				<script type="text/javascript" src="js/easing.js"></script>
				<script type="text/javascript" src="js/bootstrap.js"></script> <!-- Necessary-JavaScript-File-For-Bootstrap -->

			</body>
			</html>