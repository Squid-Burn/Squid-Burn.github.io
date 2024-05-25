<?php

// 注销登录，将uuid cookie设置为过期
setcookie('token', '', time() - 3600, '/'); // 设置cookie过期时间为当前时间 - 1小时
echo json_encode(['success' => true]);
header('Location: /'); // 重定向到登录页面
exit; // 确保在重定向后立即终止脚本的执行
?>