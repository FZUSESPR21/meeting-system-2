<?php
include("conn.php");
if(isset($_POST['pcount'])){
    $pcount = $_POST['pcount'];
}
if(isset($_POST['forumid'])){
    $forumid = $_POST['forumid'];
}
if(isset($_POST['nuseraccount'])){
    $nuseraccount = $_POST['nuseraccount'];
}
if(isset($_POST['meetid'])){
    $meetid = $_POST['meetid'];
}
if(isset($_POST['id'])){
    $id = $_POST['id'];
}
$sql = "insert  into `forum`(pcount,forumid,nuseraccount,meetid,id) values('$pcount','$forumid','$nuseraccount','$meetid','$id')";
$result = $conn -> query($sql);

