<!DOCTYPE html>
<html>
<head>
  <title>Book Now</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form method="POST" action="book.php">
    <label for="movie">Movie:</label>
    <select id="movie" name="movie">
      <option value="1">John Wick 4</option>
      <option value="2">Vikram</option>
      <option value="3">Leo</option>
      <option value="3">Avengers</option>
    </select><br><br>
    <label for="showtime">Showtime:</label>
    <input type="datetime-local" id="showtime" name="showtime"><br><br>
    <label for="tickets">Number of tickets:</label>
    <input type="number" id="tickets" name="tickets" min="1" max="10"><br><br>
    <label for="seats">Seat selection:</label>
    <input type="text" id="seats" name="seats"><br><br>
    <input type="submit" value="Book Now">
  </form>
</body>
</html>
<?php
// Connect to the database
// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'project');


// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the movie information from the database
$sql = "SELECT * FROM movies";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  while($row = mysqli_fetch_assoc($result)) {
    $movies[$row['id']] = array(
      'name' => $row['name'],
      'theater' => $row['theater'],
      'showtime' => $row['showtime'],
      'price' => $row['price'],
      'seats' => $row['seats']
    );
  }
}

// Process the form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  // Validate the input
  $errors = array();
  
  if (!isset($_POST['movie'])) {
    $errors[] = 'Please select a movie.';
  }
  
  if (!isset($_POST['showtime'])) {
    $errors[] = 'Please enter a showtime.';
  }
}
