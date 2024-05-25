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
if (isset($_COOKIE['name']) && isset($_COOKIE['token'])) {
    $name = $_COOKIE['name'];
    $token = $_COOKIE['token'];

    // 管理员用户名和令牌
    $adminUsername = "squid_burn";
    if ($name !== $adminUsername) {
        echo "没有权限执行此操作";
        exit;
    }


} else {
    // 未登录，可以选择跳转到登录页或执行其他操作
    echo "未登录";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['message_id']) && !empty($_POST['message_id'])) {
        // 获取要删除的留言ID
        $message_id = $_POST['message_id'];

        $sql = "DELETE FROM messages WHERE id = '$message_id'";
        if ($conn->query($sql) === true) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>