<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reservation Summary</title>
</head>
<body>
    <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true): ?>
        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <h1>Reservation Summary</h1>
            <p>Number of Guests: <?php echo htmlspecialchars($_POST['guests']); ?></p>

            <?php
            $guests = (int)$_POST['guests'];
            for ($i = 1; $i <= $guests; $i++) {
                $firstname = htmlspecialchars($_POST['firstname' . $i] ?? '');
                $lastname = htmlspecialchars($_POST['lastname' . $i] ?? '');
                $email = htmlspecialchars($_POST['email' . $i] ?? '');
                echo "<p>Guest $i: $firstname $lastname, Email: $email</p>";
            }
            ?>

            <p>Address: <?php echo htmlspecialchars($_POST['address']); ?></p>
            <p>Credit Card Number: <?php echo htmlspecialchars($_POST['credit_card']); ?></p>
            <p>Arrival Date: <?php echo htmlspecialchars($_POST['arrival_date']); ?> at <?php echo htmlspecialchars($_POST['arrival_time']); ?></p>
            <p>Extra Bed for a Child: <?php echo isset($_POST['extra_bed']) ? 'Yes' : 'No'; ?></p>
            <p>Facilities: 
                <?php
                if (isset($_POST['facilities'])) {
                    echo htmlspecialchars(implode(', ', $_POST['facilities']));
                } else {
                    echo 'None';
                }
                ?>
            </p>
        <?php else: ?>
            <h1>Error</h1>
            <p>No reservation data submitted. Please <a href="index.php">go back</a> and fill out the reservation form.</p>
        <?php endif; ?>
    <?php else: ?>
        <h1>Access Denied</h1>
        <p>You do not have access to this page because you are not logged in. Please <a href="login.php">login</a> to continue.</p>
    <?php endif; ?>
</body>
</html>
