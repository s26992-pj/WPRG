<?php

$start = 1; 
$end = 100; 

echo "Liczby pierwsze w zakresie od $start do $end:\n";

for ($number = $start; $number <= $end; $number++) {
    $isPrime = true;
    
    if ($number <= 1) {
        $isPrime = false;
    } else {
        for ($i = 2; $i <= sqrt($number); $i++) {
            if ($number % $i === 0) {
                $isPrime = false;
                break;
            }
        }
    }

    if ($isPrime) {
        echo $number . " ";
    }
}

?>
