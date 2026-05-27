<?php
header("Content-Type: text/html; charset=UTF-8");

/*
题目：
用户头像上传：
在页面中创建一个表单，用于上传用户头像，
选择上传的文件后，单击“保存头像”按钮，
显示上传的头像，头像要缩放。
*/

// 头像保存目录
$uploadDir = __DIR__ . "/avatars/";
$showDir = "avatars/";

if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// 默认头像
$avatar = "";
$msg = "";

function getImageExtension($mime)
{
    switch ($mime) {
        case "image/jpeg":
            return "jpg";
        case "image/png":
            return "png";
        case "image/gif":
            return "gif";
        default:
            return "";
    }
}

function canCreateThumb($mime)
{
    if (!function_exists("imagecreatetruecolor") || !function_exists("imagejpeg")) {
        return false;
    }

    switch ($mime) {
        case "image/jpeg":
            return function_exists("imagecreatefromjpeg");
        case "image/png":
            return function_exists("imagecreatefrompng");
        case "image/gif":
            return function_exists("imagecreatefromgif");
        default:
            return false;
    }
}

function saveUploadedImage($srcFile, $dstFile)
{
    if (is_uploaded_file($srcFile)) {
        return move_uploaded_file($srcFile, $dstFile);
    }

    return copy($srcFile, $dstFile);
}

// 生成缩略图函数
function createThumb($srcFile, $dstFile, $thumbWidth = 120, $thumbHeight = 120)
{
    $info = getimagesize($srcFile);

    if (!$info) {
        return false;
    }

    $mime = $info["mime"];
    $srcWidth = $info[0];
    $srcHeight = $info[1];

    if (!canCreateThumb($mime)) {
        return saveUploadedImage($srcFile, $dstFile);
    }

    switch ($mime) {
        case "image/jpeg":
            $srcImage = imagecreatefromjpeg($srcFile);
            break;
        case "image/png":
            $srcImage = imagecreatefrompng($srcFile);
            break;
        case "image/gif":
            $srcImage = imagecreatefromgif($srcFile);
            break;
        default:
            return false;
    }

    // 创建目标图片
    $dstImage = imagecreatetruecolor($thumbWidth, $thumbHeight);

    // 保持透明背景，主要用于 png/gif
    imagealphablending($dstImage, false);
    imagesavealpha($dstImage, true);

    // 缩放图片
    imagecopyresampled(
        $dstImage,
        $srcImage,
        0,
        0,
        0,
        0,
        $thumbWidth,
        $thumbHeight,
        $srcWidth,
        $srcHeight,
    );

    // 保存缩略图
    imagejpeg($dstImage, $dstFile, 90);

    imagedestroy($srcImage);
    imagedestroy($dstImage);

    return true;
}

// 处理上传
if (isset($_POST["submit"])) {
    if (isset($_FILES["avatar"]) && $_FILES["avatar"]["error"] === 0) {
        $file = $_FILES["avatar"];
        $tmpName = $file["tmp_name"];
        $fileSize = $file["size"];

        // 限制大小：2MB
        if ($fileSize > 2 * 1024 * 1024) {
            $msg = "头像文件不能超过 2MB！";
        } else {
            $info = getimagesize($tmpName);

            if (!$info) {
                $msg = "上传的不是图片文件！";
            } else {
                $allowTypes = ["image/jpeg", "image/png", "image/gif"];

                if (!in_array($info["mime"], $allowTypes)) {
                    $msg = "只允许上传 jpg、png、gif 格式的图片！";
                } else {
                    $extension = canCreateThumb($info["mime"]) ? "jpg" : getImageExtension($info["mime"]);
                    $saveName = "avatar_" . time() . "." . $extension;
                    $savePath = $uploadDir . $saveName;

                    if (createThumb($tmpName, $savePath, 120, 120)) {
                        $avatar = $showDir . $saveName;
                        $msg = "头像保存成功！";
                    } else {
                        $msg = "头像保存失败！";
                    }
                }
            }
        }
    } else {
        $msg = "请选择要上传的头像！";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>编辑用户头像</title>
    <style>
        body {
            font-family: Arial, "Microsoft YaHei", sans-serif;
            background: #ddd;
        }

        .box {
            width: 420px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            text-align: center;
        }

        .row {
            margin: 18px 0;
        }

        .avatar {
            width: 120px;
            height: 120px;
            border: 1px solid #ccc;
            object-fit: cover;
        }

        button {
            padding: 8px 20px;
            background: #169bd5;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="box">
    <h2>编辑用户头像</h2>

    <div class="row">
        用户名：王五
    </div>

    <div class="row">
        现头像：
        <?php if ($avatar !== ""): ?>
            <br>
            <img src="<?php echo $avatar; ?>" class="avatar">
        <?php else: ?>
            暂无头像
        <?php endif; ?>
    </div>

    <form method="post" enctype="multipart/form-data">
        <div class="row">
            上传头像：
            <input type="file" name="avatar">
        </div>

        <div class="row">
            <button type="submit" name="submit">保存头像</button>
        </div>
    </form>

    <p style="color:red;">
        <?php echo $msg; ?>
    </p>
</div>

</body>
</html>
