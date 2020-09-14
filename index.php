<?php
require_once "controller/user.php";
require_once "controller/admin.php";
if (isset($_GET["controller"])){
    $con =$_GET["controller"];
}
else{
    $con ='user';
}
$class = $con;
$a = new $class();
if (isset($_GET["action"])) {
    $c = $_GET["action"];
    }
else{
    $c ="index";
}
$a->$c();

?>