<?php
$servername = "127.0.0.1";
// MySQL服务器地址
$username = "squid_burn";
// MySQL用户名
$password = "Wzh_xai132B545";
// MySQL密码
$database = "server";
// 数据库名称
$isLoggedIn = false;
// 保存登录状态的变量
// 创建连接
$conn = new mysqli($servername, $username, $password, $database);
// 检查连接是否成功
if ($conn->connect_error) {
	die("连接失败: " . $conn->connect_error);
}
// 查询数据
$name = 'name';
// 列名
$pass = 'password';
// 列名
$tablename = 'user';
// 表名
$query = "SELECT `$name`, `$pass` FROM `$tablename`";
$result = $conn->query($query);
// 检查查询结果
if ($result->num_rows > 0) {
	// 处理登录请求
	if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['username']) && isset($_POST['password'])) {
		// 输入验证和过滤
		$username = $_POST['username'];
		$password = $_POST['password'];
		// 使用参数化查询预防 SQL 注入
		$query = "SELECT `$name`, `$pass` FROM `$tablename` WHERE `$name` = ? LIMIT 1";
		$stmt = $conn->prepare($query);
		$stmt->bind_param('s', $username);
		$stmt->execute();
		$stmt->store_result();
		if ($stmt->num_rows === 1) {
			$stmt->bind_result($dbUsername, $dbPassword);
			$stmt->fetch();
			// 去除密码哈希的比对，直接设置登录状态为 true
			$isLoggedIn = true;
			$stmt = $conn->prepare("SELECT * FROM user WHERE name = ?");
			$stmt->bind_param('s', $username);
			$stmt->execute();
			$result = $stmt->get_result();
			if ($result->num_rows > 0) {
				// 处理结果
				while ($row = $result->fetch_assoc()) {
					// 设置登录状态的 cookie，有效期为 1 小时
					setcookie('token', $row["token"], time() + 3600, '/');
					setcookie('name', $row["name"], time() + 3600, '/');
				}
			}
			header('Location: /');
			exit;
			// 确保在跳转后立即终止脚本的执行
		}
	}
	// 登录失败
	$isLoggedIn = false;
	echo json_encode(['success' => false]);
	exit();
} else {
	echo "没有查询到结果";
}
// 关闭连接
$conn->close();
