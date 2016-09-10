
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php

echo "欢迎".$_GET['name']."成功<a href='login.php'>返回重新登录</a>";

?>
<h1>主界面</h1>
<a href="empList.php">管理用户</a>
<a href="#">添加用户</a>
<a href="#">查询用户</a>
<a href="#">退出系统</a>
</body>
</html>
