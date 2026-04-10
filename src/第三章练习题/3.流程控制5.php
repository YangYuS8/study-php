<?php
$count = 0;
for ($num = 10; $num <= 99; $num++) {
    $shi = intval($num / 10);
    $ge = $num % 10;

    if ($ge > $shi) {
        echo $num . " ";
        $count++;
        if ($count % 10 == 0) {
            echo "<br>";
        }
    }
}
echo "<br>总个数为：" . $count;
?>