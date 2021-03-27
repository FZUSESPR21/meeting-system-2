<?php
session_start();
$idd= $_SESSION['val'];//直接输出全局变量val.

$mysqli = new mysqli("localhost", "root", "123456", "meet");
if(!$mysqli)  {
    echo"database error";
}
$result=$mysqli->query("select * from normaluser where account = '".$idd."'limit 1");
$row=$result->fetch_array();
//开始传值
$username=$row['name'];
$usertime=$row['time'];
$number=$row['number'];
echo $username,$usertime,$number;
$mysqli->close();
?>
