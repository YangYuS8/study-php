<?php
function fibNonRecursive($n) {
    if ($n == 1 || $n == 2) {
        return 1;
    }

    $a = 1;
    $b = 1;
    for ($i = 3; $i <= $n; $i++) {
        $c = $a + $b;
        $a = $b;
        $b = $c;
    }
    return $b;
}

echo "斐波那契数列前30项（非递归）：<br>";
for ($i = 1; $i <= 30; $i++) {
    echo fibNonRecursive($i) . " ";
}
?>