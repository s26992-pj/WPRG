<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Reservation Form</title>
    <script>
        function updateGuestForms() {
            var guestCount = document.getElementById('guests').value;
            var container = document.getElementById('guest_info');
            container.innerHTML = ''; 

            for (var i = 1; i <= guestCount; i++) {
                container.innerHTML += '<h3>Guest ' + i + '</h3>' +
                    'First Name: <input type="text" name="firstname' + i + '" required><br>' +
                    'Last Name: <input type="text" name="lastname' + i + '" required><br>' +
                    'Email: <input type="email" name="email' + i + '" required><br><br>';
            }
        }
    </script>
</head>
<body>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true): ?>
        <h1>Hotel Reservation Form</h1>
        <p>Welcome, <?php echo htmlspecialchars($_COOKIE['login']); ?></p>
        <form action="submit_reservation.php" method="POST" enctype="application/x-www-form-urlencoded">
            <fieldset>
                <legend>Reservation Details</legend>

                <label for="guests">Number of Guests:</label>
                <select name="guests" id="guests" required onchange="updateGuestForms()">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                </select><br><br>

                <div id="guest_info"></div>

                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea><br><br>

                <label for="credit_card">Credit Card Number:</label>
                <input type="text" id="credit_card" name="credit_card" pattern="\d{16}" title="Credit card number must be 16 digits" required><br><br>

                <label for="arrival_date">Arrival Date:</label>
                <input type="date" id="arrival_date" name="arrival_date" required><br><br>

                <label for="arrival_time">Arrival Time:</label>
                <input type="time" id="arrival_time" name="arrival_time" required><br><br>

                <label for="extra_bed">Extra Bed for a Child:</label>
                <input type="checkbox" id="extra_bed" name="extra_bed"><br><br>

                <label>Facilities:</label><br>
                <input type="checkbox" id="air_conditioning" name="facilities[]" value="air_conditioning">
                <label for="air_conditioning">Air Conditioning</label><br>
                <input type="checkbox" id="in_room_safe" name="facilities[]" value="in_room_safe">
                <label for="in_room_safe">In-room Safe</label><br>
                <input type="checkbox" id="mini_fridge" name="facilities[]" value="mini_fridge">
                <label for="mini_fridge">Mini-fridge</label><br><br>

                <input type="submit" value="Submit Reservation">
                <button type="button" id="clear">Clear</button>
            </fieldset>
        </form>
        <form method="post" action="logout.php">
            <input type="submit" value="Logout">
        </form>
    <?php else: ?>
        <h1>Access Denied</h1>
        <p>You do not have access to this page because you are not logged in. Please <a href="login.php">login</a> to continue.</p>
    <?php endif; ?>
</body>
</html>
