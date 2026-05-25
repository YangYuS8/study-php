<?php
echo "<table border='1' cellspacing='0' cellpadding='8'>";
$i = 1;
while ($i <= 5) {
    echo "<tr>";
    $j = 1;
    while ($j <= 5) {
        echo "<td>第{$i}行第{$j}列</td>";
        $j++;
    }
    echo "</tr>";
    $i++;
}
echo "</table>";
?>