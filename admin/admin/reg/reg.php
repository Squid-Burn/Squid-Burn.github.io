
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

  // 对密码进行哈希加密
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  // 检查是否存在重名用户
  $query = "SELECT * FROM admin WHERE name = ?";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // 存在重名用户
    echo "用户已存在";
    exit();
  }

  // 执行插入操作
  $query = "INSERT INTO admin (name, password) VALUES (?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param('ss', $username, $hashedPassword);

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
?>