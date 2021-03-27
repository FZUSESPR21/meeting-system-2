<?php
$servername = "localhost:3306";
$username = "root";
$password = "";
$dbname = "team";

// 创建连接
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("连接失败: " . $conn->connect_error);
}

$sql = "SELECT * FROM forum";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // 输出数据
    while($row = $result->fetch_assoc()) {
        echo "pcount: " . $row["pcount"]. " - forumid: " . $row["forumid"]. " - nuseraccount: " . $row["nuseraccount"];
    }
} else {
    echo "0 结果";
}
$conn->close();
?>

