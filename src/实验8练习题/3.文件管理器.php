<?php
header("Content-Type: text/html; charset=UTF-8");

/*
题目：
文件管理器页面：
显示当前目录中的所有子目录和文件信息。
1. 可以打开子目录；
2. 可以重命名、复制和删除文件。
*/

// 文件管理器根目录
$baseDir = realpath(__DIR__);

// 获取当前目录
$currentDir = isset($_GET["dir"]) ? $_GET["dir"] : "";
$currentPath = realpath($baseDir . DIRECTORY_SEPARATOR . $currentDir);

// 防止访问根目录之外的路径
if ($currentPath === false || strpos($currentPath, $baseDir) !== 0) {
    $currentPath = $baseDir;
    $currentDir = "";
}

// 路径安全处理
function safeName($name)
{
    return basename($name);
}

// 删除文件
if (isset($_GET["delete"])) {
    $fileName = safeName($_GET["delete"]);
    $filePath = $currentPath . DIRECTORY_SEPARATOR . $fileName;

    if (is_file($filePath)) {
        unlink($filePath);
        echo "<script>alert('删除成功');location.href='?dir={$currentDir}';</script>";
        exit();
    }
}

// 复制文件
if (isset($_POST["copy_file"])) {
    $oldName = safeName($_POST["old_name"]);
    $newName = safeName($_POST["new_name"]);

    $oldPath = $currentPath . DIRECTORY_SEPARATOR . $oldName;
    $newPath = $currentPath . DIRECTORY_SEPARATOR . $newName;

    if (is_file($oldPath) && $newName !== "") {
        copy($oldPath, $newPath);
        echo "<script>alert('复制成功');location.href='?dir={$currentDir}';</script>";
        exit();
    }
}

// 重命名文件
if (isset($_POST["rename_file"])) {
    $oldName = safeName($_POST["old_name"]);
    $newName = safeName($_POST["new_name"]);

    $oldPath = $currentPath . DIRECTORY_SEPARATOR . $oldName;
    $newPath = $currentPath . DIRECTORY_SEPARATOR . $newName;

    if (is_file($oldPath) && $newName !== "") {
        rename($oldPath, $newPath);
        echo "<script>alert('重命名成功');location.href='?dir={$currentDir}';</script>";
        exit();
    }
}

echo "<h2>文件管理器</h2>";
echo "<p>当前目录：{$currentPath}</p>";

// 返回上一级
if ($currentPath !== $baseDir) {
    $parentDir = dirname($currentDir);
    if ($parentDir === ".") {
        $parentDir = "";
    }
    echo "<p><a href='?dir={$parentDir}'>返回上一级</a></p>";
}

echo "<table border='1' cellspacing='0' cellpadding='8'>";
echo "<tr bgcolor='#cccccc'>";
echo "<th>名称</th>";
echo "<th>大小</th>";
echo "<th>类型</th>";
echo "<th>修改时间</th>";
echo "<th>操作</th>";
echo "</tr>";

$files = scandir($currentPath);

foreach ($files as $file) {
    if ($file === "." || $file === "..") {
        continue;
    }

    $path = $currentPath . DIRECTORY_SEPARATOR . $file;
    $relativePath = trim(
        $currentDir . DIRECTORY_SEPARATOR . $file,
        DIRECTORY_SEPARATOR,
    );

    $name = htmlspecialchars($file);
    $size = is_file($path) ? filesize($path) . " 字节" : "-";
    $type = is_dir($path) ? "目录" : "文件";
    $time = date("Y-m-d H:i:s", filemtime($path));

    echo "<tr>";
    echo "<td>";

    if (is_dir($path)) {
        echo "<a href='?dir={$relativePath}'>{$name}</a>";
    } else {
        echo $name;
    }

    echo "</td>";
    echo "<td>{$size}</td>";
    echo "<td>{$type}</td>";
    echo "<td>{$time}</td>";
    echo "<td>";

    if (is_file($path)) {
        echo "
        <form method='post' style='display:inline-block; margin-right:10px;'>
            <input type='hidden' name='old_name' value='{$name}'>
            <input type='text' name='new_name' placeholder='新文件名'>
            <button type='submit' name='rename_file'>重命名</button>
        </form>

        <form method='post' style='display:inline-block; margin-right:10px;'>
            <input type='hidden' name='old_name' value='{$name}'>
            <input type='text' name='new_name' placeholder='复制为'>
            <button type='submit' name='copy_file'>复制</button>
        </form>

        <a href='?dir={$currentDir}&delete={$name}' onclick='return confirm(\"确定删除吗？\")'>删除</a>
        ";
    } else {
        echo "打开";
    }

    echo "</td>";
    echo "</tr>";
}

echo "</table>";
?>
