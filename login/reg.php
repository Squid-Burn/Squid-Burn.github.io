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

// 处理注册请求
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
  // 输入验证和过滤
  $username = $_POST['username'];
  $password = $_POST['password'];

  // 检查是否存在重名用户
  $query = "SELECT * FROM user WHERE name = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // 存在重名用户
    echo "用户名已存在";
    exit();
  }

  // 生成唯一的盐值
  $salt = uniqid();

  // 执行插入操作
  $query = "INSERT INTO user (name, password, token) VALUES (?, ?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('sss', $username, $password, $salt);

  if ($stmt->execute()) {
    // 注册成功
    echo "注册成功";
    exit();
  } else {
    // 注册失败
    echo "注册失败";
    exit();
  }
}

// 关闭连接
$conn->close();
