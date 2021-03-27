<?php
session_start();
$idd= $_SESSION['val'];//直接输出全局变量val.

$mysqli = new mysqli("localhost", "root", "123456", "meet");
if(!$mysqli)  {
    echo"database error";
}
$result=$mysqli->query("select * from luntan where account = '".$idd."'limit 1");
$row=$result->fetch_array();
//开始传值
$b1=$row['bool1'];
$b2=$row['bool2'];
$b3=$row['bool3'];
echo $b1,$b2,$b3;
$mysqli->close();
?>