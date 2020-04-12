<?php
session_start();

// guest party info
$numRooms = $_SESSION['numRooms'];
$numAdults = $_SESSION['numAdults'];
$numKids = $_SESSION['numKids'];

// room type, dates, tax rate
$_SESSION['roomType'] = $_POST['rooms'];
$tax = 0.07; // 7% tax rate
$taxMult = 1.07; // multiply the total by this to get final price

// based on room type selected
if ($_SESSION['roomType'] == 1) {
  $roomName = "Standard King";
  $perNight = 143.61;
  $total = $perNight * $_SESSION['numRooms'] * $_SESSION['days'];
  $totalTax = $total * $tax; // calculates tax amount
  $totalWithTax = $total * $taxMult; // calculates total including tax
  $_SESSION['total'] = $totalWithTax;
} else if ($_SESSION['roomType'] == 2) {
  $roomName = "Standard Double";
  $perNight = 143.66;
  $total = $perNight * $_SESSION['numRooms'] * $_SESSION['days'];
  $totalTax = $total * $tax;
  $totalWithTax = $total * $taxMult;
  $_SESSION['total'] = $totalWithTax;
} else if ($_SESSION['roomType'] == 3) {
  $roomName = "Silver Suite";
  $perNight = 201.96;
  $total = $perNight * $_SESSION['numRooms'] * $_SESSION['days'];
  $totalTax = $total * $tax;
  $totalWithTax = $total * $taxMult;
  $_SESSION['total'] = $totalWithTax;
} else if ($_SESSION['roomType'] == 4) {
  $roomName = "Gold Suite";
  $perNight = 401.99;
  $total = $perNight * $_SESSION['numRooms'] * $_SESSION['days'];
  $totalTax = $total * $tax;
  $totalWithTax = $total * $taxMult;
  $_SESSION['total'] = $totalWithTax;
} else if ($_SESSION['roomType'] == 5) {
  $roomName = "Presidential Suite";
  $perNight = 452.94;
  $total = $perNight * $_SESSION['numRooms'] * $_SESSION['days'];
  $totalTax = $total * $tax;
  $totalWithTax = $total * $taxMult;
  $_SESSION['total'] = $totalWithTax;
}
?>

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
  <h3>Book your stay!</h3>
  <!-- Lists selected room, dates, and total -->
  <p><strong>Your selected room:</strong> <?php echo htmlspecialchars($roomName); ?><br>
    <strong>Check-in date:</strong> <?php echo htmlspecialchars($_SESSION['checkin']); ?> <br>
    <strong>Check-out date:</strong> <?php echo htmlspecialchars($_SESSION['checkout']); ?> <br>
    <strong>Number of rooms:</strong> <?php echo htmlspecialchars($numRooms); ?> <br>
    <strong>Adults in party:</strong> <?php echo htmlspecialchars($numAdults); ?> <br>
    <strong>Children in party:</strong> <?php echo htmlspecialchars($numKids); ?> <br>
    <strong>Total before tax:</strong> <?php echo "$".htmlspecialchars($total); ?> <br>
    <strong>Tax (7%):</strong> <?php echo "$".htmlspecialchars(number_format($totalTax,2)); ?> <br>
    <u><h3>Total after tax: <?php echo "$".htmlspecialchars(number_format($totalWithTax, 2)); ?></h3></u>
  </p>
    <hr class = "roomDivide">
    <!-- goes to confirmRes.php if customer confirms reservation -->
  <form action="confirmRes.php" method="post">
    <center>
    <table>
    <tr><td> <strong>Name</strong><br></td>
    <tr>
    <td><label>Full Name:</td>
    <td><input type = "text" name="name" required autofocus /> </td>
    </label>
    </tr>
    <tr><td> <strong>Address</strong><br></td>
    </tr>
    <tr>
    <td> <label>Street: </td>
    <td><input type = "text" name="street" required></td>
    </label>
    </tr>
    <tr>
    <td><label>City:</td>
    <td><input type = "text" name="city" required>
    </label></td>
    </tr>
    <tr>
    <td><label>State:</td>
    <td><select name="state" required>
        <option value="AL">Alabama</option>
        <option value="AK">Alaska</option>
        <option value="AZ">Arizona</option>
        <option value="AR">Arkansas</option>
        <option value="CA">California</option>
        <option value="CO">Colorado</option>
        <option value="CT">Connecticut</option>
        <option value="DE">Delaware</option>
        <option value="DC">District Of Columbia</option>
        <option value="FL">Florida</option>
        <option value="GA">Georgia</option>
        <option value="HI">Hawaii</option>
        <option value="ID">Idaho</option>
        <option value="IL">Illinois</option>
        <option value="IN">Indiana</option>
        <option value="IA">Iowa</option>
        <option value="KS">Kansas</option>
        <option value="KY">Kentucky</option>
        <option value="LA">Louisiana</option>
        <option value="ME">Maine</option>
        <option value="MD">Maryland</option>
        <option value="MA">Massachusetts</option>
        <option value="MI">Michigan</option>
        <option value="MN">Minnesota</option>
        <option value="MS">Mississippi</option>
        <option value="MO">Missouri</option>
        <option value="MT">Montana</option>
        <option value="NE">Nebraska</option>
        <option value="NV">Nevada</option>
        <option value="NH">New Hampshire</option>
        <option value="NJ">New Jersey</option>
        <option value="NM">New Mexico</option>
        <option value="NY">New York</option>
        <option value="NC">North Carolina</option>
        <option value="ND">North Dakota</option>
        <option value="OH">Ohio</option>
        <option value="OK">Oklahoma</option>
        <option value="OR">Oregon</option>
        <option value="PA">Pennsylvania</option>
        <option value="RI">Rhode Island</option>
        <option value="SC">South Carolina</option>
        <option value="SD">South Dakota</option>
        <option value="TN">Tennessee</option>
        <option value="TX">Texas</option>
        <option value="UT">Utah</option>
        <option value="VT">Vermont</option>
        <option value="VA">Virginia</option>
        <option value="WA">Washington</option>
        <option value="WV">West Virginia</option>
        <option value="WI">Wisconsin</option>
        <option value="WY">Wyoming</option>
      </select></td>
    </label>
    </tr>
    <tr>
    <td><label>Zip Code:</td>
    <td><input type = "text" name="zip" required></td>
    </label>
    </tr>
    <tr><td> <strong>Contact</strong><br></td>
    <tr>
    <tr>
    <td><label>Phone: </td>
    <td><input type = "tel" name="phone" placeholder = "###-###-####" required/></td>
    </label>
    </tr>
    <tr>
    <td><label>E-mail:</td>
    <td><input type = "email" name="email" placeholder = "name@domain.com" required/></td>
    </label>
    </tr>
    </table>
    </center>
    <input type="submit">
  </form>
</body>
</html>
