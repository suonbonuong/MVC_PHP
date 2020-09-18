<?php

require_once "config/config.php";
class model
{
    private $data;
    public function __construct()
    {
        $this->data= new database();
    }
//    get all -> count
//    limit = ?, compute -> page_number number for for loop
    public function getData($limit, $page){
        $tb = $this->data->DBreturn("SELECT * FROM `table1` limit " . $limit . " offset " . $page);
        while($r=mysqli_fetch_array($tb))
        {
            $res[]=$r;
        }
        return $res;
    }
    public function get($id){
        $tb = $this->data->DBreturn("SELECT `id`, `title`, `description`, `image`, `status`, `create_at`, `update_at` FROM `table1` WHERE id = ".$id);
        while($r=mysqli_fetch_array($tb))
        {
            $res[]=$r;
        }
        return $res[0];
    }
    public function delete($id){
        $this->data->DBreturn("DELETE from table1 where id=".$id);
    }
    public function add($title,$des,$img,$status){
        $this->data->DBreturn("INSERT INTO `table1`(`description`,`title`,`image`,`status`,`create_at`,`update_at`) VALUES ('".$des."','".$title."','".$img."','".$status."',NOW(),NOW())");
    }
    public function update($id,$title,$des,$status)
    {
        $this->data->DBreturn("UPDATE `table1` SET `title`='".$title."',`description`='".$des."',`status`='".$status."',`update_at`= NOW() WHERE id=".$id);
    }

}
?>
