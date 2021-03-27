<?php
 class Leader {
   var $all_rows;
   var $forum1_rows;
   var $forum2_rows;
   var $forum3_rows;
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
    $this->forum1_rows = $num_results;

    $query = "select * from forum where forumid = 2";
    $result = $db->query($query); //查询完的结果
    $num_results = $result->num_rows; //总行数
    $this->forum2_rows = $num_results;

    $query = "select * from forum where forumid = 3";
    $result = $db->query($query); //查询完的结果
    $num_results = $result->num_rows; //总行数
    $this->forum3_rows = $num_results;
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
   
?>
