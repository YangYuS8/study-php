<?php
require_once "config.php";

/*
文件删除功能
*/

$id = isset($_GET["id"]) ? intval($_GET["id"]) : 0;
$folderId = isset($_GET["folder_id"]) ? intval($_GET["folder_id"]) : 0;

$stmt = $pdo->prepare("SELECT * FROM netdisk_file WHERE file_id = ?");
$stmt->execute([$id]);
$file = $stmt->fetch(PDO::FETCH_ASSOC);

if ($file) {
    $filePath = $uploadDir . $file["file_save"];

    if (file_exists($filePath)) {
        unlink($filePath);
    }

    $stmt = $pdo->prepare("DELETE FROM netdisk_file WHERE file_id = ?");
    $stmt->execute([$id]);
}

header("Location: index.php?folder_id=" . $folderId);
exit();
?>
