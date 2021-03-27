<?php
Session_start();
$conn = new MySQLi("localhost:3306","root","","team");
$sql1 = "select id from forum where  forumid = 1";
$sql2 = "select id from forum where  forumid = 2";
$sql3 = "select id from forum where  forumid = 3";
$result = $conn->query($sql1);
$_SESSION['forum1_rows']=$result;
if ($_SESSION['forum1_rows']->num_rows > 0) {
    // 输出数据
    while ($_SESSION['forum1_rows'] = $result->fetch_assoc()) {
        echo "pcount: " . $_SESSION['forum1_rows'][id];
    }

}
