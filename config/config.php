<?php

class database
{
    const host = 'localhost';
    const user = 'root';
    const pwd = 'DanGerous11@';
    const dbname = "thuctap";
    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect(self::hostname,self::username,self::pwd,self::dbname);
    }
    public function DBreturn($query){
        return mysqli_query($this->conn,$query);
    }
}

$a =  new database();
$b = $a->DBreturn("SELECT * FROM `table1");
while($r=mysqli_fetch_object($b))
{
    $res[]=$r;
}
print_r($res);

?>
