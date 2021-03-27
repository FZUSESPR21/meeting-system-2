<?php
  class Secretary {
    var $forumId;
    var $page;
    function setforumId($id) {
       $this->forumId = $id;
    }
    function collect() { //得到最新一天的参会者信息
        require('config.php');
        $db = new mysqli($db_host, 	$db_username, $db_password, $db_database);

        if (mysqli_connect_errno()) {
           echo '错误: 无法连接到数据库. 请稍后再次重试.';
           exit;
        }
          // 设置字符集
        $db->query("SET NAMES utf8");
     
        $query = "select * from normaluser where account in (select normaluserid from normaluser where forumid = '".$forumId."') and time like '".date('Y-m-d')."%'"; //嵌套查询
        $result = $db->query($query); //查询完的结果
        $num_results = $result->num_rows; //总行数
        $page = $num_results / 10; //页数
        for ($i=0; $i <$num_results; $i++)
            {
                    $row = $result->fetch_assoc();
                     echo"<tr><td>".$row["name"]."</td><td>".$row["account"]."</td><td>".$row["number"]."</td><td>".$row["time"]."</td></tr>"; 
                    }
    }
    function getpage() {
        $this->collect();
        return $this->page; //返回页数
    }
    function setMessage($message) { //发帖
        require('config.php');
        require('usersee.php');
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

?>