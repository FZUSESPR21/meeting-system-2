<?php
class Meet{
    private $pcount;
    private $begintime;
    private $endtime;
    private $status;
    
    public function __construct($pcount,$begintime,$status){
        $this->pcount = $pcount;
        $this->begintime = $begintime;
        $this->status = $status;
    }

    public function changeStatue(){
        $this->status =!$this->status;
        MysqlHelper::getInstance()->mysqllink();

        $connection =MysqlHelper::getInstance()->getconn();
        $sql = "Update meet set status='{$this->status}';";
        $connection->query($sql);
        MysqlHelper::getInstance()->closelink();
        return $this->status;
    }
}


?>