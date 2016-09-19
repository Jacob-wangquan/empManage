<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<?php
require_once "EmpService.class.php";

$pageSize = 6;
$rowCount = 0;
$pageNow = 1;//显示第几页,用户通过链接改变
//根据用户的点击来修改pageNow
if(!empty($_GET['pageNow'])){
    $pageNow = $_GET['pageNow'];
}

$empService = new EmpService();
$pageCount = $empService->getPageCount($pageSize);

$res = $empService->getEmpListByPage($pageNow, $pageSize);

echo "<table width='700px' border='1'><tr><th>id</th><th>name</th><th>grade</th><th>email</th><th>salary</th><th>删除用户</th><th>修改用户</th></tr>";
//循环显示用户信息
for($i=0;$i<count($res);$i++){
    $row = $res[$i];
    echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['grade']}</td><td>{$row['email']}</td><td>{$row['salary']}</td><td><a href='#'>删除用户</a></td><td><a href='#'>修改用户</a></td></tr>";
}

echo "<h1>雇员信息表</h1>";
echo "</table>";

//显示上一页和下一页
if($pageNow>1){
    $prePage = $pageNow-1;
    echo "<a href='empList.php?pageNow=$prePage'>上一页</a>&nbsp;";
}
if($pageNow<$pageCount){
    $nextPage = $pageNow+1;
    echo "<a href='empList.php?pageNow=$nextPage'>下一页</a>&nbsp;";
}


//for打印超链接
$page_whole = 10;
$start = floor(($pageNow-1)/$page_whole)*$page_whole+1;
$index = $start;
if($pageNow>10){
    echo "<a href='empList.php?pageNow=".($start-1)."'>&nbsp;&nbsp;<<&nbsp;&nbsp;</a>";
}

for(;$start<$index+$page_whole;$start++){
    echo "<a href='empList.php?pageNow=$start'>[$start]</a>";
}
//10页翻动
echo "<a href='empList.php?pageNow=$start'>&nbsp;&nbsp;>>&nbsp;&nbsp;</a>";

//显示当前页和共有多少页
echo "当前页{$pageNow}/共有{$pageCount}页";

//指定跳转到某一页
echo "<br>";
?>
<form action="empList.php">
    跳转到：<input type="text" name="pageNow">
    <input type="submit" value="GO">
</form>



</body>
</html>