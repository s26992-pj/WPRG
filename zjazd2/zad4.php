<!DOCTYPE html>
<html lang="pl">
<head>
  <meta charset="UTF-8">
  <title>Pierwsza</title>
</head>
<body>
<h2>Sprawdź czy liczba jest liczbą pierwszą</h2>
<form method="post">
  <label for="number">Wpisz liczbę: </label><br>
  <input type="text" name="number" id="number">
  <input type="submit" value="Sprawdź">
</form>

<?php
    function isPrime($n) {
        if ($n <= 1) {
            return false;
        }
        if ($n <= 3) {
            return true;
        }
        if ($n % 2 == 0 || $n % 3 == 0) {
            return false;
        }
        $i = 5;
        while ($i * $i <= $n) {
            if ($n % $i == 0 || $n % ($i + 2) == 0) {
                return false;
            }
            $i += 6;
        }
        return true;
    }

    if($_POST) {
        $n = $_POST['number'];
        if ($n !== null && $n > 0) {
            $iterations = 0;
            $isPrime = isPrime($n);
            echo "<p>Liczba $n " . ($isPrime ? "jest" : "nie jest") . " liczbą pierwszą.</p>";
            echo "<p>Wykonano $iterations iteracji.</p>";
        } else {
            echo "<p>Niepoprawna liczba</p>";
        }
    }
?>
</body>
</html>
