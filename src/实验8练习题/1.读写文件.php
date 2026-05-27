<?php
header("Content-Type: text/html; charset=UTF-8");

/*
题目：
读取一个文件中的内容，并将部分内容写入另一个文件，
再将后一个文件上传至 D 盘下。
*/

// 原文件
$sourceFile = __DIR__ . "/source.txt";

// 保存部分内容的新文件
$newFile = __DIR__ . "/part.txt";

// D 盘保存目录
$targetDir = "D:/php_upload/";
$targetFile = $targetDir . basename($newFile);

// 如果原文件不存在，先创建一个测试文件
if (!file_exists($sourceFile)) {
    $text = "这是 source.txt 文件中的内容。\n";
    $text .= "这里是第二行内容。\n";
    $text .= "这里是第三行内容。\n";
    $text .= "PHP 可以对文件进行读取、写入、复制和删除操作。";

    file_put_contents($sourceFile, $text);
}

// 读取原文件内容
$content = file_get_contents($sourceFile);

// 截取部分内容
$partContent = mb_substr($content, 0, 50, "UTF-8");

// 写入新文件
file_put_contents($newFile, $partContent);

// 判断 D 盘目录是否存在，不存在则创建
if (!is_dir($targetDir)) {
    mkdir($targetDir, 0777, true);
}

// 将新文件复制到 D 盘
if (copy($newFile, $targetFile)) {
    echo "文件上传成功！<br>";
    echo "原文件：" . $sourceFile . "<br>";
    echo "新文件：" . $newFile . "<br>";
    echo "上传位置：" . $targetFile . "<br>";
} else {
    echo "文件上传失败！请检查 D 盘目录权限。";
}
?>
