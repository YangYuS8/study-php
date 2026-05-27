<?php
require_once "config.php";

/*
文件下载功能
*/

$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;

$stmt = $pdo->prepare("SELECT * FROM netdisk_file WHERE file_id = ?");
$stmt->execute([$id]);
$file = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$file) {
    die("文件不存在！");
}

$filePath = $uploadDir . $file["file_save"];

if (!file_exists($filePath)) {
    die("服务器上的文件不存在！");
}

header("Content-Type: application/octet-stream");
header(
    "Content-Disposition: attachment; filename=" . basename($file["file_name"]),
);
header("Content-Length: " . filesize($filePath));

readfile($filePath);
exit();
?>
