<?php
session_start();

$mysqli = new mysqli("localhost", "root", "123456", "meet");


$id = $_POST['id'];
$password = $_POST['password'];
$type = $_POST['type'];
$_SESSION['val']=$id;

if($type==1)//主席
{

    $zhu = $mysqli->query("select account from leader where account = '".$id."' and psw = '".$password."' limit 1");

    $result = mysqli_fetch_array($zhu);
    if($result) {
        header("Location: /ceshi/主席.php");exit;
//    echo '登录成功';
    }else{
        echo '登录失败','<a href="javascript:history.back(-1);">返回重试</a>';exit();
    }
}
else if ($type==2)//分坛主席
{

    $fenzhu = $mysqli->query("select account from forumleader where account = '".$id."' and psw = '".$password."' limit 1");



    $result = mysqli_fetch_array($fenzhu);
    if($result) {
        header("Location: /ceshi/分坛主席.php");exit;
//    echo '登录成功';
    }else{
        echo '登录失败','<a href="javascript:history.back(-1);">返回重试</a>';exit();
    }
}
else if ($type==3)//秘书
{

    $mi = $mysqli->query("select account from secretary where account = '".$id."' and psw = '".$password."' limit 1");



    $result = mysqli_fetch_array($mi);
    if($result) {
        header("Location: /ceshi/秘书.php");exit;
//    echo '登录成功';
    }else{
        echo '登录失败','<a href="javascript:history.back(-1);">返回重试</a>';exit();
    }
}
else if ($type==4)//普通用户
{

    $user = $mysqli->query("select account from normaluser where account = '".$id."' and psw = '".$password."' limit 1");

    $result = mysqli_fetch_array($user);
    if($result) {
        header("Location: /ceshi/ue.php");exit;
//    echo '登录成功';
    }else{
        echo '登录失败','<a href="javascript:history.back(-1);">返回重试</a>';exit();
    }
}