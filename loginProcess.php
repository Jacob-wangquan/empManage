<?php
require_once 'AdminService.class.php';

$id = $_POST['id'];
$password = $_POST['password'];

//实例化一个AdminService方法
$adminService = new AdminService();
$name = $adminService->checkAdmin($id, $password);
if($name != ""){
    //合法
    header("Location:empManage.php?name=$name");
    exit();
}else{
    //非法
    header("Location:login.php?errno=1");
    exit();
}

