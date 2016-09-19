<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/9/19
 * Time: 23:05
 */
class FenyePage{
    public $pageSize=6;
    public $res_array;  //这是显示数据
    public $rowCount; //这是从数据库中获取
    public $pageNow; //用户指定的
    public $pageCount; //这个是计算得到的
}