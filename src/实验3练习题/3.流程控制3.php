<?php
echo "100到200之间的水仙花数有：<br>";
for ($num = 100; $num <= 200; $num++) {
    $a = intval($num / 100);
    $b = intval(($num % 100) / 10);
    $c = $num % 10;

    if ($a * $a * $a + $b * $b * $b + $c * $c * $c == $num) {
        echo $num . "<br>";
    }
}
?>