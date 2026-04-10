<?php
function fibRecursive($n) {
    if ($n == 1 || $n == 2) {
        return 1;
    }
    return fibRecursive($n - 1) + fibRecursive($n - 2);
}

echo "斐波那契数列前30项（递归）：<br>";
for ($i = 1; $i <= 30; $i++) {
    echo fibRecursive($i) . " ";
}
?>