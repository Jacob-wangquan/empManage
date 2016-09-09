<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/9
 * Time: 15:22
 */


$id = $_POST['id'];
$password = $_POST['password'];

//到数据库验证
//得到连接
$conn = mysql_connect("localhost","","");
if(!$conn){
    die("连接失败".mysql_errno());
}
//设置访问数据库的编码形式
mysql_query("set names utf8",$conn) or die("设置编码失败".mysql_errno());
//选择数据库
mysql_select_db("empmanage",$conn) or die(mysql_errno());
//发送sql语句,要防止sql注入,
//变化验证的逻辑
//通过输入的id获取数据库的密码，然后再和输入的密码比对
$sql = "select password from admin where id=$id";



//简单验证
//if($id == '100' && $password =='123'){
//    //合法，跳转到管理页面
//    header("Location:empManage.php");
//    //如果要跳转，则最好带上exit();
//    exit();
//}else{
//    //非法
//    header("Location:login.php?errno=1");//默认get提交
//    exit();
//}