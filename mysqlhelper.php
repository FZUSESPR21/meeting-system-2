<?php
class MysqlHelper{
    private static $instance;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    public $conn;
    /**
     * 得到连接
     * 
     * @return object
     */
    public function getconn(){
        return $this->conn;
    }
    public static function getInstance(){
        if(self::$instance==null){
            self::$instance=new MysqlHelper();
        }
        return self::$instance;
    }
    public function mysqllink(){
        // 创建连接
        $this->conn = new mysqli($this->servername, $this->username, $this->password);
        // 检测连接
        if ($this->conn->connect_error) {
            die("连接失败: " . $this->conn->connect_error);
        } 
        echo "连接成功";
    }
    public function closelink(){
        $this->conn->close();
    }
}


?>
