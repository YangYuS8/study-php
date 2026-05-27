<?php
header("Content-Type: text/html; charset=UTF-8");

/*
题目：
编写函数，用来遍历某一目录，
并显示目录中子目录和文件的基本信息。
*/

// 要遍历的目录，可以根据需要修改
$dir = __DIR__;

function showDirInfo($dir)
{
    if (!is_dir($dir)) {
        echo "目录不存在！";
        return;
    }

    echo "<h2>目录 {$dir} 下的内容</h2>";

    echo "<table border='1' cellspacing='0' cellpadding='8'>";
    echo "<tr bgcolor='#6699cc'>";
    echo "<th>文件名</th>";
    echo "<th>文件大小</th>";
    echo "<th>文件类型</th>";
    echo "<th>修改时间</th>";
    echo "</tr>";

    $handle = opendir($dir);

    while (($file = readdir($handle)) !== false) {
        $path = $dir . DIRECTORY_SEPARATOR . $file;

        $type = is_dir($path) ? "dir" : "file";
        $size = is_file($path) ? filesize($path) : 0;
        $time = date("Y/m/d", filemtime($path));

        echo "<tr>";
        echo "<td>{$file}</td>";
        echo "<td>{$size}</td>";
        echo "<td>{$type}</td>";
        echo "<td>{$time}</td>";
        echo "</tr>";
    }

    closedir($handle);

    echo "</table>";
}

showDirInfo($dir);
?>
