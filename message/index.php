<?php
require $_SERVER['DOCUMENT_ROOT'] . '/login/verify.php';
?>
<!DOCTYPE html>
<html>
<head>
    <script>
    </script>
    <meta charset="utf-8">
    <title>留言板</title>
    <style>
        body {
            /* font-family: Arial, sans-serif; */
            max-width: 500px;
            margin: 0 auto;
            background-image: url('background.jpg');
            background-repeat: no-repeat;
            background-size: cover;
            backdrop-filter: blur(10px);
        }

        h1 {
            text-align: center;
            color: white;
            text-shadow: 2px 2px 3px rgba(0, 0, 0, 0.3);
            margin-top: 50px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center; /* 居中对齐 */
            margin-bottom: 20px;
            padding: 15px;
            background-color: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 10px;
        }

        textarea {
            width: 100%;
            height: 80px;
            resize: vertical;
            border: 2px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            font-size: 16px;
            white-space: pre-wrap; /* 添加自动换行属性 */
            word-wrap: break-word; /* 添加自动换行属性 */
        }

        button {
            display: block;
            margin: 10px 0;
            padding: 10px 20px;
            font-size: 16px;
            background-color: #1e88e5;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #1976d2;
        }

        .message {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            margin-bottom: 10px;
            background-color: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(5px);
        }
        
        .message p {
            margin: 0;
        }
    </style>
</head>
<body style="background-image: url(/photo/massage.jpg)">
    <h1>留言板</h1>

    <form method="POST" action="process.php">
        <textarea name="message" placeholder="输入你的留言" wrap="soft"></textarea>
        <button type="submit">提交留言</button>
    </form>
    <div id="messages-container"></div>
</body>
</html>
<?php
include 'display.php';
?>