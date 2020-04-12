<!DOCTYPE html>
<html>
<head>
  <title>The Kipper Hotel</title>
  <link rel="stylesheet" type="text/css" href="hotelStyle.css">
</head>
<body>
  <img src = "images/hotelBanner.png">
  <p>
  <div class = "navbar">
    <a href = "index.html">Home</a> |
    <a href = "amenities.html">Amenities</a> |
    <a href = "dining.html">Dining</a> |
    <a href = "attractions.html">Attractions</a>
    </div>
  </p>
  <p><strong>
    254 Clifford Ave<br>
    New York, NY 10119
  </strong></p>
  <p>
    <a href = "tel:547-737-7829">547-737-7829</a><br>
    <a href = "mailto:kipper@kipperhotel.com">kipper@kipperhotel.com</a>
  </p>
  <p>
    Located across from Pennsylvania Station.<br>
    Easy access to trains, the subway, taxis, Uber, and more!
  </p>
  <hr>
<h3>All of our rooms come equipped with the following:</h3>
      Wireless high-speed internet access<br>
      42" flat screen TV<br>
      Miniature refrigerator<br>
      Coffee maker<br>
      Hair dryer, iron, and ironing board<br>
      Blackout curtains<br>
      Work desk<br>
      In-room security box/safe
<h3>In addition, our suites include:</h3>
      Floor-to-ceiling windows for incredible views<br>
      Kitchenette (utensils are provided) and dining room<br>
      iHome stereo system<br>
      Marble and stone bathroom<br>
<hr class = "roomDivide">
</center>
</body>
</html>
<?php

session_start();

$dbhost = 'localhost';
$dbuser = 'phoebehuang';
$dbpass = 'phoebehuangpass';
$dbname = 'phoebehuangdatabase';

$connection = mysqli_connect($dbhost,$dbuser,$dbpass);

if (!$connection) {
  die("Failed to connect to database" . mysqli_error($connection));
}

$db_select = mysqli_select_db($connection, $dbname);
if (!$db_select) {
  die("Database selection failed" . mysqli_error());
}

date_default_timezone_set("America/Curacao");
// Arrival dates
$_SESSION['checkin'] = $_POST["checkin"];
$arrive = date("Y-m-d", strtotime($_POST["checkin"]));
$dateArrive = date_create($_SESSION['checkin']);
// Departure dates
$_SESSION['checkout'] = $_POST["checkout"];
$depart = date("Y-m-d", strtotime($_POST["checkout"]));
$dateDepart = date_create($_SESSION['checkout']);

// Rooms, adults, children
$_SESSION['numRooms'] = $_POST["numRooms"];
$_SESSION['numAdults'] = $_POST["numAdults"];
$_SESSION['numKids'] = $_POST["numChildren"];

// Gets rooms from db
$query = "SELECT * FROM rooms WHERE id NOT IN (SELECT roomId FROM reservations WHERE checkIn < DATE('$arrive') AND checkOut > DATE('$depart'))";
$result = mysqli_query($connection, $query);
$roomResult = mysqli_query($connection, $query);

if (!$result || !$roomResult){
  echo "Error: " . $query . "<br>" . mysqli_error($connection);
}

// Drop down to select room
echo "<h2>Select your room below:</h2>";
echo "<form action='res.php' method='post'>"; // goes to res.php page if submitted
echo "<select name = 'rooms'>";
while ($rows = mysqli_fetch_array($result)) {
  $id = $rows['id'];
  $name = $rows['type'];
  echo "<option value = ".htmlspecialchars($id).">".$name."</option>";
}
echo "</select><br>";
echo "<input type='submit'>";
echo "<hr class = 'roomDivide'>";
// Available rooms
echo "<h2>Rooms available for your stay:</h2>";
while ($rows = mysqli_fetch_array($roomResult)) {
  $name = $rows['type'];
  $price = $rows['price'];
  $pic = $rows['image'];
  $size = $rows['sqft'];

  $stay = date_diff($dateArrive, $dateDepart);
  $_SESSION['days'] = $stay->format("%a");
  $_SESSION['totalPrice'] = $_SESSION['days'] * $price * $_SESSION['numRooms'];
  echo "<h3>".htmlspecialchars($name)."</h3>"; // room name/type
  echo "<p><img class = 'rooms' src = ".htmlspecialchars($pic).">"; // room image
  echo "<h3>".htmlspecialchars($size)."<br>"; // room size (sq ft)
  echo "$".htmlspecialchars($price)." per night, per room<br>"; // price per night per room
  echo "$".htmlspecialchars($_SESSION['totalPrice'])." total (before tax)<br></h3>"; // price before tax
  echo "<hr class = 'roomDivide'>";
}
?>
