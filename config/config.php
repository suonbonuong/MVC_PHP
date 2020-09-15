<?php

class database
{
    private $conn;
    public function __construct()
    {
        $this->conn = mysqli_connect('localhost','root1','','thuctap');
    }
    public function DBreturn($query){
        return mysqli_query($this->conn,$query);
    }
}

?>
