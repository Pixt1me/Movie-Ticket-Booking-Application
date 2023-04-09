<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<style>
		/* Style the navigation bar */
		nav {
			background-color: #333;
			overflow: hidden;
		}

		/* Style the links inside the navigation bar */
		nav a {
			float: left;
			display: block;
			color: white;
			text-align: center;
			padding: 14px 16px;
			text-decoration: none;
		}

		/* Change the color of links on hover */
		nav a:hover {
			background-color: #ddd;
			color: black;
		}

		/* Add a dropdown menu */
		.dropdown {
			float: left;
			overflow: hidden;
		}

		/* Style the dropdown button */
		.dropdown .dropbtn {
			font-size: 16px;
			border: none;
			outline: none;
			color: white;
			padding: 14px 16px;
			background-color: inherit;
			font-family: inherit;
			margin: 0;
		}

		/* Change the color of dropdown button on hover */
		.dropdown:hover .dropbtn {
			background-color: #ddd;
			color: black;
		}

		/* Add a red background color to dropdown links on hover */
		.dropdown-content a:hover {
			background-color: #f1f1f1;
			color: black;
		}

		/* Style the dropdown content */
		.dropdown-content {
			display: none;
			position: absolute;
			background-color: #f9f9f9;
			min-width: 160px;
			box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			z-index: 1;
		}

		/* Style the links inside the dropdown */
		.dropdown-content a {
			float: none;
			display: block;
			text-align: left;
			padding: 12px 16px;
			text-decoration: none;
			color: black;
		}

		/* Add a border to the dropdown links */
		.dropdown-content a {
			border-bottom: 1px solid #ddd;
		}

		/* Show the dropdown menu on hover */
		.dropdown:hover .dropdown-content {
			display: block;
		}
	</style>
</head>
<body>
	<nav>
		<a href="Home.php">Home</a>
		<div class="dropdown">
			<button class="dropbtn">Bookings
				<i class="fa fa-caret-down"></i>
			</button>
			<div class="dropdown-content">
				<a href="NewBooking.php">New Booking</a>
				<a href="PreviousBookings.php">Previous Bookings</a>
			</div>
		</div>
		<a href="Movies.php">Movies</a>
		<a href="Theatres.php">Theaters</a>
		<a href="ContactUs.php">Contact Us</a>
		<a href="Signout.php">Sign Out</a>
	</nav>

	<!-- Page content -->
	<div>
		<!-- Add your content here -->
	</div>

<div class="header">
	<h2>Home Page</h2>
</div>
<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?>! Hope you are in the mood for some movies.</strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>
</div>
</body>
</html>