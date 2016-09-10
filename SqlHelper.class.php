<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 13:46
 */
//工具类,完成对数据库的操作
class SqlHelper{
    public $conn;
    public $dbname='empmanage';
    public $username='root';
    public $password='';
    public $host = 'localhost';

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host,$this->username,$this->password);
        if(!$this->conn){
            die('连接失败'.mysqli_error($this->conn));
        }
        mysqli_select_db($this->conn,$this->dbname );
    }
    //执行dql
    public function execute_dql($sql){
        $res = mysqli_query( $this->conn,$sql) or die(mysqli_error($this->conn));
        return $res;
    }
    //执行dql语句，但返回的是一个数组
    public function execute_dql2($sql){

        $arr=array();
        $res=mysqli_query($this->conn,$sql) or die(mysqli_error($this->conn));

        $i=0;
        //把$res=>$arr 把结果集内容转移到一个数组中.
        while($row=mysqli_fetch_assoc($res)){
            $arr[$i++]=$row;
        }
        //这里就可以马上把$res关闭.
        mysqli_free_result($res);
        return $arr;

    }

    //执行dml
    public function execute_dml($sql){
        $b = mysqli_query( $this->conn,$sql);
        if(!$b){
            return 0;
        }else{
            if(mysqli_affected_rows($this->conn)>0){
                return 1;//执行成功
            }else{
                return 2;//没有行收到影响
            }
        }
    }

    //关闭连接的方法
    public function close_connect(){
        if(!empty($this->conn)){
            mysqli_close($this->conn);
        }
    }
}