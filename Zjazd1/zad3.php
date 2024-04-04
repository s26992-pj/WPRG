<?php

$n = 10; 
$fibonacci = [0, 1]; 

echo "Nieparzyste elementy ciągu Fibonacciego do N = $n:\n";

for ($i = 2; $i < $n; $i++) {
    $fibonacci[$i] = $fibonacci[$i - 1] + $fibonacci[$i - 2];
    
    if ($fibonacci[$i] % 2 !== 0) {
        echo ($i + 1) . ": " . $fibonacci[$i] . "\n"; // Numeracja od 1
    }
}

?>
