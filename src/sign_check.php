<?php
include('conn.php');
$mysqli=mysqli_connect("localhost","root","123456","meet");

$id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];
$pwd = $_POST['pwd'];

//写入数据到数据库
//$mysqli = new mysqli("localhost", "root", "123456", "test");
//if(!$mysqli)  {
//    echo"database error";
//}else{
//    echo"php env successful";
//}
if(strlen($password)<6){
    exit('错误：密码长度不符合<a href="javascript:history.back(-1);">返回重试</a>');
}
if($password == $pwd) {
    $che = $mysqli->query("select account from normaluser where account = ('$id') limit 1");

//  $che=$mysqli->query("select * from register");
    if(mysqli_fetch_array($che)){
        echo'错误：用户',$id,'已存在。<br/><a href="javascript:history.back(-1);">返回重试</a>';
        exit;
    }


//    $query = "insert into normaluser values('".$username."','".$id."','".$password."','".date('Y-m-d H:i:s')."','".$id."')";
//
//
//
//    $res = $mysqli->query($sql,$mysqli);
    $sql = "insert into normaluser values('".$username."','".$id."','".$password."','".date('Y-m-d H:i:s')."','".$id."')";


    $res = $mysqli->query($sql,$conn);
    if($res){
        header("Location: /ceshi/ue.php");exit;
    }else{
        echo'对不起！注册失败:',mysqli_error(),'<br/>';
        echo '<a href="javascript:history.back(-1);">返回重试</a>';
    }

}else{
    echo'密码不一致';
    echo'<a href="javascript:history.back(-1);">返回重试</a>';
}

?>
