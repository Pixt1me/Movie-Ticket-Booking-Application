<!DOCTYPE html>
<html>
<head>
	<title>Movies</title>
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
	<!-- Page content -->
	<div>
		<h1>Movies</h1>
		<p>This is the Movies page of the ticket booking app.</p>
	</div>
	<?php
		// Connect to the database
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$dbname = "project";
		$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

		if (!$conn) {
			die("Connection failed: " . mysqli_connect_error());
		}
		$sql = "SELECT * FROM movies";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<h2>" . $row["movie_name"] . "</h2>";
				echo "<p>" . $row["description"] . "</p>";
				echo "<p>Rating: " . $row["rating"] . "</p>";
				echo "<p>Release Date: " . $row["release_date"] . "</p>";
				echo "<p><a href='book.php?movie_id=" . $row["movie_id"] . "'>Book Now</a></p>";
				echo "<hr>";
			}
		} else {
			echo "<p>No movies found.</p>";
		}

		mysqli_close($conn);
	?>
    </div>
</body>
</body>
</html>