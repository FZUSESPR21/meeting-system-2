<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdn.bootcdn.net/ajax/libs/twitter-bootstrap/3.0.1/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="prolocutor.css" rel="stylesheet">
        <title>会议主席</title>
    </head>
    <body>
        <div class="main">
            <div class="container">
                <div class="topbar">
                    <div class="row clearfix">                        
                        <div class="col-md-1 column" style="border: 1px black soild;">这里的z主席ggggg昵称 ▼</div>
                    </div>
                </div>
                <div id="page_nav">
                    <table width=1110px height=50px>
                        <tr style="background-color:rgb(247, 244, 244)"><th style="padding-left:20px;">论坛名称</th><th>论坛议题</th><th>分论坛主席</th><th>当前人数</th></tr>
                        <?php
                        class Leader {
                          var $all_rows;
                          function conn() {
                           require('config.php');
                           $db = new mysqli($db_host, 	$db_username, $db_password, $db_database);
                       
                           if (mysqli_connect_errno()) {
                              echo '错误: 无法连接到数据库. 请稍后再次重试.';
                              exit;
                           }
                             // 设置字符集
                           $db->query("SET NAMES utf8");
                        

                           $query = "select * from forum";
                           $result = $db->query($query); //查询完的结果
                           $num_results = $result->num_rows; //总行数
                           $this->all_rows = $num_results;
                       
                           $query = "select * from forum where forumid = 1";
                           $result = $db->query($query); //查询完的结果
                           $num_results = $result->num_rows; //总行数
                           $forum_rows[0]= $num_results;
                       
                           $query = "select * from forum where forumid = 2";
                           $result = $db->query($query); //查询完的结果
                           $num_results = $result->num_rows; //总行数
                           $forum_rows[1] = $num_results;
                       
                           $query = "select * from forum where forumid = 3";
                           $result = $db->query($query); //查询完的结果
                           $num_results = $result->num_rows; //总行数
                           $forum_rows[2] = $num_results;
                           $query = "select * from forum";
                           $result = $db->query($query); //查询完的结果
                           $num_results = $result->num_rows; //总行数
                           echo"<label class=\"total\">当前会议共有${num_results}个论坛！</label>";
                           for ($i=0; $i <$num_results; $i++)
                            {
                                $row = $result->fetch_assoc();
                                echo"<tr><td>".$row["name"]."</td><td>".$row["title"]."</td><td>".$row["leader"]."</td><td>".$forum_rows[$i]."</td></tr>"; 
                            }    
                            $totalnum=$forum_rows[0]+$forum_rows[1]+$forum_rows[2];
                           echo"<label class=\"total\">已经拥有${totalnum}个参会者啦！</label>";
                          }
                          function getMcount() { //查看总参会人数
                            $this->conn();
                            return $this->all_rows;
                          }
                          function getF1count() { //查看第一个分论坛的人数
                             $this->conn();
                             return $this->forum1_rows;
                          }
                          function getF2count() { //查看第二个分论坛的人数
                           $this->conn();
                           return $this->forum2_rows;
                         }
                          function getF3count() { //查看第三个分论坛的人数
                           $this->conn();
                           return  $this->forum3_rows;
                         }
                        }
                          $leader = new Leader;
                          $leader->conn();
                       ?>
                    </table>
                </div>
            </div>       
        </div>
    </body>
</html>