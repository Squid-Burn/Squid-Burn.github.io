
<?php
// 检查是否提交了表单
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取输入的用户名和密码
    $username = $_POST["username"];

    // 假设数据库表名为 "users"，包含字段 "username" 和 "hashed_password"

    // 数据库连接配置
    $servername = "localhost";
    $username_db = "squid_burn";
    $password_db = "Wzh_xai132B545";
    $database = "server";
    

    // 创建数据库连接
    $conn = new mysqli($servername, $username_db, $password_db, $database);

    // 检查连接是否成功
    if ($conn->connect_error) {
        die("连接失败: " . $conn->connect_error);
    }

    // 使用参数化查询
    $sql = "DELETE FROM admin WHERE name = ?";

    // 准备查询语句
    $stmt = $conn->prepare($sql);
    
    // 绑定参数
    $stmt->bind_param("s", $username);

    // 执行查询
    $stmt->execute();

    // 检查受影响的行数
    if ($conn->affected_rows > 0) {
        // 删除成功
        echo "删除成功";
    } else {
        // 没有找到匹配的用户名
        echo "没有找到匹配的用户名";
    }

    // 关闭语句和连接
    $stmt->close();
    $conn->close();
}
?>
