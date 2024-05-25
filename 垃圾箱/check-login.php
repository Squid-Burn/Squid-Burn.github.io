<?php

// 检查登录状态
if (isset($_COOKIE['isLoggedIn']) && $_COOKIE['isLoggedIn'] === 'true') {
  echo json_encode(['isLoggedIn' => true]);
} else {
  echo json_encode(['isLoggedIn' => false]);
}