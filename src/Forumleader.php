<?php
  class Forumleader {
    var $forumId;
    var $forum_rows;
    function setforumId($id) {
        $this->forumId = $id;
     }
    function conn() {
        require('config.php');
        $db = new mysqli($db_host, 	$db_username, $db_password, $db_database);
    
        if (mysqli_connect_errno()) {
           echo '错误: 无法连接到数据库. 请稍后再次重试.';
           exit;
        }
          // 设置字符集
        $db->query("SET NAMES utf8");
     
        $query = "select * from forum where forumid = '".$this->forumId."'";
        $result = $db->query($query); //查询完的结果
        $num_results = $result->num_rows; //总行数
        $this->forum_rows = $num_results;
       }
     function getFcount() { //查看分论坛的总人数
        $this->conn();
        return $this->forum_rows;
     }
     function setMessage($message) { //发帖
        require('config.php');
        $db = new mysqli($db_host, 	$db_username, $db_password, $db_database);
    
        if (mysqli_connect_errno()) {
           echo '错误: 无法连接到数据库. 请稍后再次重试.';
           exit;
        }
          // 设置字符集
        $db->query("SET NAMES utf8");
     
        $query = "insert into msg values('".$message."','".date('Y-m-d')."','".$this->forumId."')"; 
        $result = $db->query($query); 
    }
    function getAddPeople() { //得到最新一天的参会者数量
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
        return $num_results;
    }
  }
?>