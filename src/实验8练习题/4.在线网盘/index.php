<?php
header("Content-Type: text/html; charset=UTF-8");
require_once "config.php";

/*
题目：
在线网盘：
实现文件夹的创建、打开和删除；
文件的上传、下载和删除。
*/

// 当前文件夹 ID
$folderId = isset($_GET["folder_id"]) ? intval($_GET["folder_id"]) : 0;

// 创建文件夹
if (isset($_POST["create_folder"])) {
    $folderName = trim($_POST["folder_name"]);

    if ($folderName !== "") {
        $stmt = $pdo->prepare(
            "INSERT INTO netdisk_folder(folder_name, folder_path, folder_pid)
             VALUES(?, ?, ?)",
        );
        $stmt->execute([$folderName, strval($folderId), $folderId]);
    }

    header("Location: index.php?folder_id=" . $folderId);
    exit();
}

// 上传文件
if (isset($_POST["upload_file"])) {
    if (isset($_FILES["myfile"]) && $_FILES["myfile"]["error"] === 0) {
        $fileName = $_FILES["myfile"]["name"];
        $fileSize = $_FILES["myfile"]["size"];
        $tmpName = $_FILES["myfile"]["tmp_name"];

        $saveName =
            time() . "_" . mt_rand(1000, 9999) . "_" . basename($fileName);
        $savePath = $uploadDir . $saveName;

        if (move_uploaded_file($tmpName, $savePath)) {
            $stmt = $pdo->prepare(
                "INSERT INTO netdisk_file(file_name, file_save, file_size, folder_id)
                 VALUES(?, ?, ?, ?)",
            );
            $stmt->execute([$fileName, $saveName, $fileSize, $folderId]);
        }
    }

    header("Location: index.php?folder_id=" . $folderId);
    exit();
}

// 删除文件夹
if (isset($_GET["delete_folder"])) {
    $deleteId = intval($_GET["delete_folder"]);

    // 判断文件夹是否为空
    $stmt1 = $pdo->prepare(
        "SELECT COUNT(*) FROM netdisk_folder WHERE folder_pid = ?",
    );
    $stmt1->execute([$deleteId]);
    $childFolderCount = $stmt1->fetchColumn();

    $stmt2 = $pdo->prepare(
        "SELECT COUNT(*) FROM netdisk_file WHERE folder_id = ?",
    );
    $stmt2->execute([$deleteId]);
    $fileCount = $stmt2->fetchColumn();

    if ($childFolderCount == 0 && $fileCount == 0) {
        $stmt = $pdo->prepare("DELETE FROM netdisk_folder WHERE folder_id = ?");
        $stmt->execute([$deleteId]);
        echo "<script>alert('文件夹删除成功');location.href='index.php?folder_id={$folderId}';</script>";
    } else {
        echo "<script>alert('文件夹不为空，不能删除');location.href='index.php?folder_id={$folderId}';</script>";
    }

    exit();
}

// 获取当前目录下的文件夹
$stmt = $pdo->prepare(
    "SELECT * FROM netdisk_folder WHERE folder_pid = ? ORDER BY folder_id DESC",
);
$stmt->execute([$folderId]);
$folders = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 获取当前目录下的文件
$stmt = $pdo->prepare(
    "SELECT * FROM netdisk_file WHERE folder_id = ? ORDER BY file_id DESC",
);
$stmt->execute([$folderId]);
$files = $stmt->fetchAll(PDO::FETCH_ASSOC);

// 获取当前文件夹名称
$currentName = "主目录";

if ($folderId != 0) {
    $stmt = $pdo->prepare(
        "SELECT folder_name FROM netdisk_folder WHERE folder_id = ?",
    );
    $stmt->execute([$folderId]);
    $folder = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($folder) {
        $currentName = $folder["folder_name"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>在线网盘</title>
</head>
<body>

<h2>在线网盘</h2>

<p>您的位置：<?php echo htmlspecialchars($currentName); ?></p>

<?php if ($folderId != 0): ?>
    <p><a href="index.php">返回主目录</a></p>
<?php endif; ?>

<form method="post">
    新建文件夹：
    <input type="text" name="folder_name">
    <button type="submit" name="create_folder">创建</button>
</form>

<br>

<form method="post" enctype="multipart/form-data">
    <input type="file" name="myfile">
    <button type="submit" name="upload_file">上传</button>
</form>

<br>

<table border="1" cellspacing="0" cellpadding="8">
    <tr bgcolor="#cccccc">
        <th>文件名</th>
        <th>大小</th>
        <th>上传时间</th>
        <th>操作</th>
    </tr>

    <?php foreach ($folders as $folder): ?>
        <tr>
            <td><?php echo htmlspecialchars($folder["folder_name"]); ?></td>
            <td>-</td>
            <td><?php echo $folder["folder_time"]; ?></td>
            <td>
                <a href="index.php?folder_id=<?php echo $folder[
                    "folder_id"
                ]; ?>">打开</a>
                |
                <a href="index.php?folder_id=<?php echo $folderId; ?>&delete_folder=<?php echo $folder[
    "folder_id"
]; ?>"
                   onclick="return confirm('确定删除该文件夹吗？')">删除</a>
            </td>
        </tr>
    <?php endforeach; ?>

    <?php foreach ($files as $file): ?>
        <tr>
            <td><?php echo htmlspecialchars($file["file_name"]); ?></td>
            <td><?php echo round($file["file_size"] / 1024, 2); ?> KB</td>
            <td><?php echo $file["file_time"]; ?></td>
            <td>
                <a href="download.php?id=<?php echo $file[
                    "file_id"
                ]; ?>">下载</a>
                |
                <a href="delete.php?id=<?php echo $file[
                    "file_id"
                ]; ?>&folder_id=<?php echo $folderId; ?>"
                   onclick="return confirm('确定删除该文件吗？')">删除</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
