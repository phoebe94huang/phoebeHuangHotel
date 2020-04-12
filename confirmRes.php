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

// Guest info from form
$name = $_POST["name"];
$st = $_POST["street"];
$city = $_POST["city"];
$state = $_POST["state"];
$zip = $_POST["zip"];
$phone = $_POST["phone"];
$email = $_POST["email"];

// total price with tax
$price = $_SESSION['total'];

// guest party info
$numRooms = $_SESSION['numRooms'];
$numAdults = $_SESSION['numAdults'];
$numKids = $_SESSION['numKids'];

$arrive = date("Y-m-d", strtotime($_SESSION['checkin']));
$depart = date("Y-m-d", strtotime($_SESSION['checkout']));
$roomType = $_SESSION['roomType'];

// saves guest and reservation info to database
$guestSql = "INSERT INTO guest (name, street, city, state, zip, phone, email) VALUES ('$name', '$st', '$city', '$state', '$zip', '$phone', '$email')";
$reservationSql = "INSERT INTO reservations (checkIn, checkOut, guestName, roomID, totalPrice, numRooms, numAdults, numKids) VALUES ('$arrive', '$depart', '$name', '$roomType', '$price', '$numRooms', '$numAdults', '$numKids')";
if (mysqli_query($connection, $guestSql) && mysqli_query($connection, $reservationSql)) { // confirmation message
    echo "<h2>Your reservation has been confirmed! Thank you, ".htmlspecialchars($name).", for choosing The Kipper Hotel as your home away from home.<br>";
    echo "We look forward to seeing you on ".htmlspecialchars($arrive).". See ya real soon!</h2>";
} else {
    echo "Error: " . $guestSql . $reservationSql . "<br>" . mysqli_error($connection);
}

mysqli_close($connection);
?>
