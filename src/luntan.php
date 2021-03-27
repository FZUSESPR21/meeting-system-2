<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="subForumPage.css" rel="stylesheet">
    <title>分论坛界面</title>
</head>
<body>
<?php
session_start();
$idd= $_SESSION['val'];    //直接输出全局变量val.
$luntanid=$_GET['luntanid'];



$mysqli = new mysqli("localhost", "root", "123456", "meet");
if (!$mysqli) {
    echo "database error";
}
$result = $mysqli->query("select * from luntanmsg where forumid = '" .$luntanid. "'limit 1");
$row = $result->fetch_array();
//开始传值
$msgname = $row['msgname'];
$msgtime = $row['time'];
$msgzhuxi = $row['zhuxi'];
$msgcontent = $row['content'];
$msgxinxi = $row['xinxi'];
$msgjianjie = $row['jianjie'];


$mysqli->close();


include ('usersee.php');
print <<<EOT

  <div class="main">
            <div class="container">
                <div class="topbar">
                    <div class="row clearfix">
                        <div class="col-md-10 column">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="ue.php" style="margin-top: 5px;">会议首页</a>
                                </li>
                                <li>
                                    <a href="#tiezi" style="margin-top: 5px;">帖子详情</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-2 column">
                     
                            <a type="button" class="btn btn-default logout">$username</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="midbar">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <div class="jumbotron">
                                <h1>
                                    您好, 欢迎来到分论坛($msgname)!
                                </h1>
                                <h2>
                                    论坛详情如下：
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix" id="luntan">
                        <div class="col-md-12 column">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>
                                            论坛名称
                                        </th>
                                        <th>
                                            论坛议题
                                        </th>
                                        <th>
                                            id
                                        </th>
                                        <th>
                                            论坛简介
                                        </th>
                                        <th>
                                            分论坛主席
                                        </th>
                                        <th>
                                            论坛信息
                                        </th>
                                        <th>
                                            论坛开始时间
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="success">
                                        <td>
                                            $msgname
                                        </td>
                                        <td>
                                            $msgcontent
                                        </td>
                                        <td>
                                            $luntanid
                                        </td>
                                        <td>
                                            $msgjianjie
                                        </td>
                                        <td>
                                            $msgzhuxi
                                        </td>
                                        <td>
                                            $msgxinxi
                                        </td>
                                        <td>
                                            $msgtime
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
EOT;
?>
            <div class="container">
                <div class="bottombar">
                    <div class="row clearfix" id="tiezi">
                        <div class="col-md-12 column">
                            <div class="jumbotron">
                                <p>
                                   <?php
                                   $mysqli = new mysqli("localhost", "root", "123456", "meet");
                                   if (!$mysqli) {
                                       echo "database error";
                                   }
                                   $result = $mysqli->query("select * from msg where forumid = '" .$luntanid. "' ");
                                   $row = $result->fetch_array();
                                   //开始传值

                                   $sql = "select * from msg where forumid = '".$luntanid."' ";
                                   $result = mysqli_query($mysqli,$sql);


                                   while($row = mysqli_fetch_array($result))
                                   {
                                       echo "<p>";
                                       echo $row['name'],"于",$row['time'],"发布：",$row['content'];
//                                       echo "<td>" . $row['time'] . "</td>";
//                                       echo "<td>" . $row['content'] . "</td>";
//                                       echo "<td>" . $row['forumid'] . "</td>";
                                       echo "</p>";
                                   }


//                                   $fabuname = $row['name'];
//                                   $fabucontent = $row['content'];
//                                   $fabutime = $row['time'];
//                                   $fabuforumid = $row['forumid'];
//                                   echo $fabutime," ",$fabuname," 发布:",$fabucontent;

                                   $mysqli->close();
                                   ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>    
            </div>
        </div>




</body>
</html>
