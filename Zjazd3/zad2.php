<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obliczanie silni - Iteracyjnie i Rekurencyjnie</title>
</head>
<body>
    <h2>Obliczanie silni - Iteracyjnie i Rekurencyjnie</h2>
    <form action="" method="get">
        <label for="n">Podaj liczbę:</label>
        <input type="number" name="n" id="n">
        <button type="submit">Oblicz</button>
    </form>

    <?php
        function silnia_iteracyjnie($n){
            $silnia = 1;
            for($i = $n; $i > 1; $i--){
                $silnia = $silnia * $i;
            }
            return $silnia;
        }

        function silnia_rekurencyjnie($n){
            if($n <= 1){
                return 1;
            } else {
                return $n * silnia_rekurencyjnie($n - 1);
            }
        }

        if(isset($_GET['n'])){
            $n = $_GET['n'];    

            $start_iteracyjnie = microtime(true);
            $czas_iteracyjnie = silnia_iteracyjnie($n);
            $koniec_iteracyjnie = microtime(true);
            $wynik_iteracyjnie = number_format($koniec_iteracyjnie - $start_iteracyjnie, 10);

            $start_rekurencyjnie = microtime(true);
            $czas_rekurencyjnie = silnia_rekurencyjnie($n);
            $koniec_rekurencyjnie = microtime(true);
            $wynik_rekurencyjnie = number_format($koniec_rekurencyjnie - $start_rekurencyjnie, 10);

            $szybsza_funckja = ($wynik_iteracyjnie < $wynik_rekurencyjnie) ? "iteracyjna" : "rekurencyjna";
            $roznica_czasu = number_format(abs($wynik_rekurencyjnie - $wynik_iteracyjnie), 10);

            echo '<p>Czas obliczania silni iteracyjnie: ' . $wynik_iteracyjnie . ' sekund</p>'; 
            echo '<p>Czas obliczania silni rekurencyjnie: ' . $wynik_rekurencyjnie . ' sekund</p>';
            echo '<p>Szybsza funkcja to: ' . $szybsza_funckja . '</p>';
            echo '<p>Różnica czasu: ' . $roznica_czasu . ' sekund</p>'; 
        }
    ?>
</body>
</html>
