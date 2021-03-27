<?php 
include('mysqlhelper.php');
class Normal{
    private $name;
    private $account;
    private $psw;
    private $time;
    private $number;
    private $forumlist;

    function __construct($name, $account, $psw, $time, $number,$forumlist){
        $this->name = $name;
        $this->account = $account;
        $this->psw = $psw;
        $this->time = $time;
        $this->number = $number;
        $this->forumlist = $forumlist;
    }
    /**
     * 得到选择的论坛的所有消息
     *
     * @return string
     */
    public function getmessage(){
        /**
         * 连接数据库
         */
        MysqlHelper::getInstance()->mysqllink();

        $sql = "SELECT name,forumid FROM forum where forum.nuseraccount=".$this->account.";";
        $connection =MysqlHelper::getInstance()->getconn();
        $message =$connection->query($sql);
        
        echo $message;

        /**
         * 关闭数据库
         *
         */
        MysqlHelper::getInstance()->closelink();
        return $message;
    }
    /**
     * 选择参加的论坛 
     *
     * @return void
     */    
    public function choose($pcount,$nuseraccount,$meetid,$name)
    {
        MysqlHelper::getInstance()->mysqllink();
        $forum=new Forum($pcount,$nuseraccount,$meetid,$name);
        array_push($this->forumlist,$forum);
        $sql = "Insert into forum values({$pcount},{$nuseraccount},{$meetid},{$name});";
        $connection =MysqlHelper::getInstance()->getconn();
        $connection->query($sql);
        MysqlHelper::getInstance()->closelink();
    }
    /**
     * 注册
     *
     * @return void
     */
    public function register($account,$psw){
        MysqlHelper::getInstance()->mysqllink();
        $registerSQL = "select * from normaluser where account={$this->account};";
        $connection =MysqlHelper::getInstance()->getconn();
        $register=$connection->query($registerSQL);
        if ($register->num_rows != 0) {
            echo "存在该账户";
        } else {
            $sql = "Insert normaluser forum values({$account},{$account});";
            $connection->query($sql);
        }
        MysqlHelper::getInstance()->closelink();
       
    }
    /**
     * 登陆
     *
     * @return void
     */
    public function login(){
        MysqlHelper::getInstance()->mysqllink();
        $loginSQL = "select * from normaluser where account={$this->account} and psw={$this->psw};";
        $connection =MysqlHelper::getInstance()->getconn();
        $resultLogin=$connection->query($loginSQL);
        if ($resultLogin->num_rows > 0) {
            echo "登录成功";
        } else {
            echo "登录失败";
        }
        MysqlHelper::getInstance()->closelink();
    }
    /**
     * 退出
     *
     * @return void
     */
    public function logout(){

    }

}

?>