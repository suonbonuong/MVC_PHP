<?php
require_once "model/model.php";

class user
{
    protected $model;
    public function __construct()
    {
        $this->model= new model();
    }
    public function index(){
        (isset($_POST['limit']) ?$limit = $_POST['limit'] : $limit = 5);
        (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $pr = $this->model->getdata($limit, $page);
        require "view/User/user.html";
    }
}
?>