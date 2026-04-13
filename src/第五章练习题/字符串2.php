<?php
function getExt($filename) {
    return pathinfo($filename, PATHINFO_EXTENSION);
}

$file = "document.docx";
echo "文件名：" . $file . "<br>";
echo "后缀名：" . getExt($file);
?>