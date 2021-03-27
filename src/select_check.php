<?php
include('conn.php');
$mysqli=mysqli_connect("localhost","root","123456","meet");
session_start();
$signid= $_SESSION['sign'];    //直接输出全局变量val.
$bool1 = $_POST['bool1'];
$bool2 = $_POST['bool2'];
$bool3 = $_POST['bool3'];
echo $signid,$bool1,$bool2,$bool3;

if($bool1=="on")
    $bool1=1;
else $bool1=0;
if($bool2=="on")
    $bool2=1;
else $bool2=0;
if($bool3=="on")
    $bool3=1;
else $bool3=0;
echo $signid,$bool1,$bool2,$bool3;
//写入数据到数据库
//$mysqli = new mysqli("localhost", "root", "123456", "test");
//if(!$mysqli)  {
//    echo"database error";
//}else{
//    echo"php env successful";
//}

$sql = "insert into luntan values('".$signid."','".$bool1."','".$bool2."','".$bool3."')";


$res = $mysqli->query($sql);
if($res){
    header("Location: /ceshi/login.html");exit;
}else{
    echo'对不起！写入失败:',mysqli_error(),'<br/>';
    echo '<a href="javascript:history.back(-1);">返回重试</a>';
}


?>
