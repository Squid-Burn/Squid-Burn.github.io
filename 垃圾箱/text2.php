<?php
$servername = "127.0.0.1";  // MySQL服务器地址
$username = "squid_burn";     // MySQL用户名
$password = "Wzh_xai132B545";     // MySQL密码
$database = "server";     // 数据库名称

// 创建连接
$conn = new mysqli($servername, $username, $password, $database);

// 检查连接是否成功
if ($conn->connect_error) {
  die("连接失败: " . $conn->connect_error);
}

$name = 'squid_burn';
$password = 'Wzh_xai132B545';

// 对密码进行哈希处理
$hashedName = password_hash($name, PASSWORD_DEFAULT);
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// 添加数据
$sql = "INSERT INTO login(name,password) VALUES ('$hashedName','$hashedPassword')";

if ($conn->query($sql) === true) {
  echo '插入成功';
} else {
  echo '错误: ' . $sql . '<br>' . $conn->error;
}

// 关闭连接
$conn->close();
?>