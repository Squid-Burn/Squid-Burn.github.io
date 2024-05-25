<?php
$servername = "127.0.0.1";  // MySQL服务器地址
$username = "squid_burn";     // MySQL用户名
$password = "Wzh_xai132B545";     // MySQL密码
$database = "root";     // 数据库名称

try {
    // 创建连接
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    
    // 设置PDO错误模式为异常
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // 查询数据
    $name = 'name';  // 列名
    $pass = 'password';  // 列名
    $tablename = 'login';  // 表名
    $query = "SELECT `$name`, `$pass` FROM `$tablename` LIMIT 0, 10";
    $stmt = $conn->query($query);
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // 循环输出结果
    foreach ($data as $row) {
        echo $row[$name] . " ";
        echo $row[$pass] . "\n";
    }
} catch(PDOException $e) {
    // 连接失败
    echo "连接失败: " . $e->getMessage();
}
?>