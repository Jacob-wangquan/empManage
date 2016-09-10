<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 13:44
 */

require_once 'SqlHelper.class.php';
//业务逻辑类，主要完成对admin表的操作
class AdminService
{
    //提供验证用户是否合法的方法
    public function checkAdmin($id,$password){
        $sql = "select password,name from admin where id=$id";//sql语句必须用双引号
        //创建sqlhelper对象
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        if($row = mysqli_fetch_assoc($res)){
            if(md5($password)==$row['password']){
                return $row['name'];
            }
        }
        //释放资源
        mysqli_free_result($res);
        //关闭连接
        $sqlHelper->close_connect();
        return "";
    }
}