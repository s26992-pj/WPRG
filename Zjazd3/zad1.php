<!DOCTYPE html>
<html>
<head>
    <title>Formularz daty urodzenia</title>
</head>
<body>
    <h2>Podaj swoją datę urodzenia:</h2>
    <form action="" method="GET">
        Data urodzenia: <input type="date" name="birthdate">
        <input type="submit">
    </form>

    <?php
    if (isset($_GET['birthdate'])) {
        $birthdate = $_GET['birthdate'];

        function dayOfWeek($date) {
            return date('l', strtotime($date));
        }

        function calculateAge($birthdate) {
            $birthDate = new DateTime($birthdate);
            $today = new DateTime();
            $age = $today->diff($birthDate);
            return $age->y;
        }

        function daysToNextBirthday($birthdate) {
            $currentYear = date('Y');
            $nextBirthday = date('Y-m-d', strtotime($currentYear . '-' . date('m-d', strtotime($birthdate))));
            if ($nextBirthday < date('Y-m-d')) {
                $nextBirthday = date('Y-m-d', strtotime('+1 year', strtotime($nextBirthday)));
            }
            $daysToNextBirthday = (strtotime($nextBirthday) - strtotime(date('Y-m-d'))) / (60 * 60 * 24);
            return $daysToNextBirthday;
        }

        $dayOfWeek = dayOfWeek($birthdate);
        $age = calculateAge($birthdate);
        $daysToNextBirthday = daysToNextBirthday($birthdate);

        echo "<h2>Informacje:</h2>";
        echo "Urodziłeś/aś się w dniu: $dayOfWeek<br>";
        echo "Masz $age lat.<br>";
        echo "Do Twoich następnych urodzin pozostało $daysToNextBirthday dni.";
    }
    ?>
</body>
</html>
