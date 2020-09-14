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
        $pr = $this->model->getdata();
        require "view/User/user.html";

    }

}
?>