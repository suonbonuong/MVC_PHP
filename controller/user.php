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
        $page = 1;
        $pr = $this->model->getdata($limit);
        require "view/User/user.html";
    }
}
?>