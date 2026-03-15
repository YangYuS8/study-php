<?php
$username = $_POST["username"];
$password = $_POST["password"];

if ($username == "user" && $password == "123456") {
    echo "登录成功！";
} else {
    echo "登录失败，登录名或密码错误！";
}
?>