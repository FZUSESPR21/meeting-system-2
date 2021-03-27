<?php

$mysqli = new mysqli("localhost", "root", "123456", "meet");
if(!$mysqli)  {
    echo"database error";
}
$result=$mysqli->query("select * from normaluser");

$row=$result->fetch_array();

$mysqli->close();

?>

