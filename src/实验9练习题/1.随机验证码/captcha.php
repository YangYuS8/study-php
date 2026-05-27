<?php
session_start();

/*
题目：
创建随机生成验证码图片，
字符范围为 0-9 的数字和 26 个小写英文字母，
并将验证码图片插入在登录页面中。
*/

// 验证码字符范围
$chars = "0123456789abcdefghijklmnopqrstuvwxyz";

// 随机生成 4 位验证码
$code = "";
for ($i = 0; $i < 4; $i++) {
    $code .= $chars[random_int(0, strlen($chars) - 1)];
}

// 保存验证码到 session
$_SESSION["captcha"] = $code;

// 创建 SVG 图片，避免依赖未安装的 GD 扩展
$width = 120;
$height = 40;

// 添加干扰线
$lines = "";
for ($i = 0; $i < 6; $i++) {
    $lines .= sprintf(
        '<line x1="%d" y1="%d" x2="%d" y2="%d" stroke="#b4b4b4" stroke-width="1" />' . "\n",
        random_int(0, $width),
        random_int(0, $height),
        random_int(0, $width),
        random_int(0, $height),
    );
}

// 添加干扰点
$dots = "";
for ($i = 0; $i < 100; $i++) {
    $dots .= sprintf(
        '<circle cx="%d" cy="%d" r="1" fill="#787878" />' . "\n",
        random_int(0, $width),
        random_int(0, $height),
    );
}

// 写入验证码字符
$letters = "";
for ($i = 0; $i < strlen($code); $i++) {
    $letter = htmlspecialchars($code[$i], ENT_XML1, "UTF-8");
    $x = 20 + $i * 22;
    $y = random_int(24, 32);
    $angle = random_int(-15, 15);

    $letters .= sprintf(
        '<text x="%d" y="%d" fill="#1e1e1e" font-size="22" font-family="Consolas, Monaco, monospace" font-weight="700" transform="rotate(%d %d %d)">%s</text>' . "\n",
        $x,
        $y,
        $angle,
        $x,
        $y,
        $letter,
    );
}

// 输出图片
header("Content-Type: image/svg+xml; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

echo <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="{$width}" height="{$height}" viewBox="0 0 {$width} {$height}">
<rect width="100%" height="100%" fill="#f5f5f5" />
{$lines}{$dots}{$letters}</svg>
SVG;
