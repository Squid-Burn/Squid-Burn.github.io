<?php
require $_SERVER['DOCUMENT_ROOT'] . '/login/verify.php';
?>
<?php
$servername = "127.0.0.1";
$username = "squid_burn";
$password = "Wzh_xai132B545";
$database = "server";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("数据库连接失败: " . $conn->connect_error);
}

$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="message">' . $row['message'] . '</div>';
        echo '<form method="POST" action="delete.php">';
        echo '<input type="hidden" name="message_id" value="' . $row['id'] . '">';
        echo '<button type="submit">删除</button>';
        echo '</form>';
        echo "<br>"; // 添加换行
    }
} else {
    echo "暂无留言";
}

$conn->close();
?>