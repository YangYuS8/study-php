<?php
$a = array(-1, -2, 3, 5, 29, 50, 100);

sort($a);
$diff = $a[count($a) - 1] - $a[0];

echo "最大值和最小值的差是：" . $diff;
?>