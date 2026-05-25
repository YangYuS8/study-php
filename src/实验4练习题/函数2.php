<?php
function isPrime($num) {
    if ($num < 2) {
        return false;
    }
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            return false;
        }
    }
    return true;
}

function printPrimes($limit) {
    for ($i = 2; $i <= $limit; $i++) {
        if (isPrime($i)) {
            echo $i . " ";
        }
    }
}

echo "100以内的素数有：<br>";
printPrimes(100);
?>