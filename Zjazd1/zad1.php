<?php

$fruits = array("jablko", "banan", "pomarancza");

foreach (array_reverse($fruits) as $fruit) {
    echo strrev($fruit) . "\n";
    
    if (strtolower($fruit[0]) === 'p') {
        echo "Zaczyna się na literę \"p\"\n";
    }
}

?>
