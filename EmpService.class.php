<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 13:44
 */
require_once "SqlHelper.class.php";

class EmpService
{
    //一个函数可以获取共有多少页
    function getPageCount($pageSize){
        //需要查询rowCount
        $sql = "select count(id) from emp";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql($sql);
        //这样可以计算$pageCount
        if($row = mysqli_fetch_row($res)){
            $pageCount = ceil($row[0]/$pageSize);
        }

        mysqli_free_result($res);
        $sqlHelper->close_connect();
        return $pageCount;

    }

    //一个函数可以获取应当显示的雇员信息
    function getEmpListByPage($pageNow,$pageSize){
        $sql = "select * from emp limit ".($pageNow-1)*$pageSize.",$pageSize";
        $sqlHelper = new SqlHelper();
        $res = $sqlHelper->execute_dql2($sql);

        $sqlHelper->close_connect();

        return $res;
    }
}










