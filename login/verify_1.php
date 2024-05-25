<?php
// 连接到MySQL数据库
$servername = "localhost";  // 替换为你的MySQL服务器地址
$username = "squid_burn";    // 替换为你的MySQL用户名
$password = "Wzh_xai132B545";    // 替换为你的MySQL密码
$dbname = "server";      // 替换为你要连接的数据库名

$conn = new mysqli($servername, $username, $password, $dbname);

// 检查连接是否成功
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

// 查询获取token列的值
$sql = "SELECT token FROM user";  // 将表名替换为你要查询的表名
$result = $conn->query($sql);

$tokens = array();

if ($result->num_rows > 0) {
    // 将每个token的值添加到数组中
    while ($row = $result->fetch_assoc()) {
        $tokens[] = $row["token"];
    }
}

// 返回JSON响应
$response = array("tokens" => $tokens);
echo json_encode($response);

// 关闭数据库连接
$conn->close();
