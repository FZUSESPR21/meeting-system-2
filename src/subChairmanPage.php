<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="subChairmanPage.css" rel="stylesheet">
        <title>分论坛主席界面</title>
    </head>
    <body>
        <div class="main">
            <div class="container">
                <div class="topbar">
                    <div class="row clearfix">
                        <div class="col-md-10 column topleft">
                            <ul class="nav nav-pills">
                                <li class="active">
                                    <a href="mainPage.html" style="margin-top: 5px;">会议首页</a>
                                </li>
                                <li>
                                    <a href="#tongzhi" style="margin-top: 5px;">通知编辑</a>
                                </li>
                            </ul> 
                        </div>
                        
                        <div class="col-md-2 column topright">
                            <button type="button" class="btn btn-default setting">Setting</button>
                            <button type="button" class="btn btn-default logout">Logout</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="midbar">
                    <div class="row clearfix">
                        <div class="col-md-12 column">
                            <?php
                                class Forumleader {
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
                                        echo "<p>
                                        恭喜，本论坛今天又收获了".$this->num_results."名参会者!
                                            </p>";
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
                                $forumleader = new Forumleader;
                                $forumleader->collect();
                                $ww=isset($_POST['message'])? $_POST['message']:'NA';
                                $forumleader->setMessage($ww);
                            ?>
                            <h1>
                                您好, 分论坛主席!
                            </h1>
                            <p>
                                <a class="btn btn-primary btn-large" href="subForumPage.html">我的论坛</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="bottombar">
                    <div class="row clearfix" id="tongzhi">
                        <div id="new_message">
                            <label id="lab">最近有什么新动向吗</label>            
                            <form id="putin" action="subChairmanPage.php" method="post">
                                <textarea id="mes" name="message" placeholder="请输入要发布的内容" cols="130" rows="8" style="OVERFLOW:hidden"></textarea>
                                <input type="submit" id="assign_button" value="发布">
                            </form>
                        </div>
                    </div>
                </div>    
            </div>
                
        </div>
    </body>
</html>