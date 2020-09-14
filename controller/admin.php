<?php

require_once "controller/user.php";

class admin extends user
{
    public function index()
    {
        $pr = $this->model->getdata();
        require "view/admin/admin.html";

    }
    public function show(){
        $id = (int)$_GET["id"];
        $b = $this->model->get($id);
        $title = $b["title"];
        $img = $b["image"];
        $des = $b["description"];
        $create = (string)$b["create_at"];
        $update = (string)$b["update_at"];
        if($b["status"]==0){
            $status = "Disnable";
        }
        else{
            $status = "Enable";
        };
        require "view/admin/show.html";
    }
    public function delete(){
        $id = (int)$_GET["id"];
        $this->model->delete($id);
        $pr = $this->model->getdata();
        require_once "view/admin/admin.html";
    }
    public function edit(){
        $id = (int)$_GET["id"];
        $b = $this->model->get($id);
        $img = $b["image"];
        require "view/admin/edit.html";
        //return $img;
    }
    public function upload(){
        if (isset($_POST['upload'])){
            $id = $_GET['id'];
            $title = $_POST["Title"];
            $des = $_POST["Description"];
            $status = $_POST["status"];
            }
        $this->model->update($id,$title,$des,$status);
        $this->index();
    }
    public function addview(){
        require_once "view/admin/add.html";
    }
    public function add(){
        if(isset($_POST["add"]))
        {
            $title = $_POST["Title"];
            $img = $_POST["myfile"];
            $des = $_POST["Description"];
            $status = $_POST["status"];
            $this->model->add($title,$des,$img,$status);
            $this->index();
        }
    }
}
?>