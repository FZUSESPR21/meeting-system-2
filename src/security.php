<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="security.css" rel="stylesheet">
        <title>秘书</title>
    </head>
    <body>
        
        <div class="main">
            <div class="container">
                <div class="topbar">
                    <div class="row clearfix">
                        <div class="col-md-8 column">
                            <ul class="nav nav-pills">
                                <li class="active">
                                        <a href="#">最新参与者</a>
                                </li>
                                <li>
                                        <a href="#luntan">发布论坛</a>
                                </li>
                            </ul>
                        </div>
                        
                        <div class="col-md-1 column" style="border: 1px black soild;">这里的秘书ggggg昵称 ▼</div>
                    </div>
                </div>
                <div id="page_nav">
                    <table width=1110px height=50px>
                        <tr style="background-color:rgb(247, 244, 244)"><th style="padding-left:20px;">用户名</th><th>用户ID</th><th>手机号</th><th>注册时间</th></tr>
                    
                    <?php
                      class Secretary {
                        var $forumId = 1; // $_SESSION['saveid'];
                        var $num_results;
                        function collect() { //得到最新一天的参会者信息
                            require('config.php');
                            $db = new mysqli($db_host, 	$db_username, $db_password, $db_database);
                    
                            if (mysqli_connect_errno()) {
                               echo '错误: 无法连接到数据库. 请稍后再次重试.';
                               exit;
                            }
                              // 设置字符集
                            $db->query("SET NAMES utf8");
                         
                            $query = "select * from normaluser where account in (select normaluserid from forum where forumid = '".$this->forumId."') and time like '".date('Y-m-d')."%'"; //嵌套查询
                            $result = $db->query($query); //查询完的结果
                            $this->num_results = $result->num_rows; //总行数
                            for ($i=0; $i <$this->num_results; $i++)
                            {
                                $row = $result->fetch_assoc();
                                echo"<tr><td>".$row["name"]."</td><td>".$row["account"]."</td><td>".$row["number"]."</td><td>".$row["time"]."</td></tr>"; 
                            }
                        }
                        function getpage() {
                            echo"</table>
                                <div style=\"font-size: 20px;}\">今天新加入了".$this->num_results."位伙伴哦</div>"; //返回页数
                        }
                        function setMessage($message) { //发帖
                            require('usersee.php');
                            require('config.php');
                            $db = new mysqli($db_host, 	$db_username, $db_password, $db_database);
                        
                            if (mysqli_connect_errno()) {
                               echo '错误: 无法连接到数据库. 请稍后再次重试.';
                               exit;
                            }
                              // 设置字符集
                            $db->query("SET NAMES utf8");
                         
                            $query = "insert into msg values('".$username."','".$message."','".date('Y-m-d')."','".$this->forumId."')"; 
                            $result = $db->query($query); 
                        }
                      }
                      $secretary = new Secretary;
                      $secretary->collect();
                      $secretary->getpage();
                      $ww= $_POST['message'];
                      $secretary->setMessage($ww);
                    ?>
                    
                    
                </div>
                <div id="new_message">
                    <label id="lab">最近有什么新动向吗</label>            
                    <form id="putin" action="security.php" method="post">
                        <textarea id="mes" name="message" placeholder="请输入要发布的内容" cols="130" rows="8" style="OVERFLOW:hidden"></textarea>
                        <input type="submit" id="assign_button" value="发布">
                    </form>
                </div>
            </div>       
        </div>
    </body>
</html>