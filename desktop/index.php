<?php
require $_SERVER['DOCUMENT_ROOT'] . '/admin/verify.php';
?>
<!DOCTYPE html>
<html lang="zh-CN">

<head>
  <script src="/admin/login.js"></script>
  <title>远程连接</title>
  <meta charset="utf-8">
  <link rel="shortcut icon" type="image/x-icon" href="/照片/logo.jpg" />
  <style>
    body {
      font: 16px arial, 'Microsoft Yahei', 'Hiragino Sans GB', sans-serif;
    }

    h1 {
      margin: 0;
      color: #0cbee6;
      font-size: 32px;
      text-align: center;
    }

    .content {
      width: 60%;
      margin: 0 auto;
      /* 居中 */
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      max-width: 600px;
      margin: 20px auto;
      -webkit-backdrop-filter: blur(20px);
      backdrop-filter: blur(20px);
      box-shadow: inset 0 0 6px rgba(255, 255, 255, 0.2);
      border-radius: 12px;
    }

    th,
    td {
      padding: 10px;
      border: 1px solid #ccc;
      text-align: left;
      vertical-align: middle;
      font-weight: normal;
      color: #333;
    }

    th {
      font-weight: bold;
      background-color: #f5f5f5;
      color: #555;
    }

    td {
      background-color: transparent !important;
    }

    td,
    th {
      -webkit-backdrop-filter: blur(20px);
      backdrop-filter: blur(20px);
      box-shadow: inset 0 0 6px rgba(255, 255, 255, 0.2);
    }

    .content div {
      text-align: center;
      margin: 20px;
    }

    .content div a {
      color: #0cbee6;
      text-decoration: none;
    }

    .content div a:hover {
      text-decoration: underline;
    }
  </style>
</head>

<body background="/照片/logo.jpg">
  <div class="content">
    <h1 class="h1">远程桌面</h1>
    <table>
      <tr>
        <th>连接地址</th>
        <td>desktop.wzhserver.eu.org:54312</td>
      </tr>
      <tr>
        <th>备用地址</th>
        <td>desktop2.wzhserver.eu.org:54312</td>
      </tr>
    </table>
    <div></div>
  </div>
</body>

</html>