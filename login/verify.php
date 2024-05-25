<?php

$servername = "127.0.0.1";
$username = "squid_burn";
$password = "Wzh_xai132B545";
$database = "server";
$isLoggedIn = false;

// 创建连接
$conn = new mysqli($servername, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 检查是否设置了对应的Cookie
if (isset($_COOKIE['token']) && isset($_COOKIE['name'])) {
    // 获取Cookie中的值
    $cookieToken = $_COOKIE['token'];
    $cookieName = $_COOKIE['name'];

    // 使用参数化查询预防 SQL 注入
    $query = "SELECT * FROM `user` WHERE `token` = ? AND `name` = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('ss', $cookieToken, $cookieName);
    $stmt->execute();

    // 检查查询结果是否有匹配的用户
    if ($stmt->fetch()) {
        $isLoggedIn = true;
        // echo "Cookie中的token和name与数据库中匹配，用户已登录。";
    } else {
        header("Location: /login/");
    }
} else {
    header("Location: /login/");
}

// 关闭连接
$conn->close();
