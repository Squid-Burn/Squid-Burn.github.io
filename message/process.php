<?php
require $_SERVER['DOCUMENT_ROOT'] . '/login/verify.php';
?>
<?php
$servername = "127.0.0.1";
$username = "squid_burn";
$password = "Wzh_xai132B545";
$database = "server";
$conn = new mysqli($servername, $username, $password, $database);

// 检查用户是否已登录，获取用户名和令牌
if(isset($_COOKIE['name']) && isset($_COOKIE['token'])){
    $username = $_COOKIE['name'];
    $token = $_COOKIE['token'];
} else {
    // 未登录，可以选择跳转到登录页或执行其他操作
    echo "未登录";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if (isset($_POST['message']) && !empty($_POST['message'])) {
		$message = trim($_POST['message']);
		$message = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
		
		// 获取当前时间
		$current_time = date('Y-m-d H:i:s');
		
		$stmt = $conn->prepare("INSERT INTO messages (name, token, message, time) VALUES (?, ?, ?, ?)");
		$stmt->bind_param("ssss", $username, $token, $message, $current_time);
		if ($stmt->execute()) {
			echo "留言提交成功";
		} else {
			echo "Error: " . $stmt->error;
		}
		$stmt->close();
	}
}

$conn->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
?>