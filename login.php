<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>管理员登录</h1>
<form action="loginProcess.php" method="post">
    <table>
        <tr><td>用户名<td></td><td><input type="text" name="id"></td></tr>
        <tr><td>密码<td></td><td><input type="password" name="password"></td></tr>
        <tr>
            <td><input type="submit" value="登录"></td>
            <td><input type="reset" value="重新填写"></td>
        </tr>
    </table>
</form>
<?php
//接收errno
if(!empty($_GET['errno'])){
    $errno = $_GET['errno'];
    if($errno ==1){
        echo "<span style='color:red;'>你的用户名或者密码错误</span>";
    }
}

?>

</body>
</html>