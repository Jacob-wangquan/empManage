<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/10
 * Time: 13:41
 */
//它的一个对象实例，表示表的一条纪录
class Admin
{
    private $id;
    private $name;
    private $password;

    public function getId(){
        return $this->id;
    }
    public function getName(){
        return $this->name;
    }
    public function getPassword(){
        return $this->password;
    }

    public function setId($id){
         $this->id = $id;
    }
    public function setName($name){
         $this->name = $name;
    }
    public function setPassword($password){
         $this->password = $password;
    }

}