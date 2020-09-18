<?php

require_once "controller/user.php";

class admin
{
    protected $model;
    public function __construct()
    {
        $this->model= new model();
    }

    public function index()

    {
        (isset($_POST['limit']) ?$limit = $_POST['limit'] : $limit = 1);
        (isset($_GET['page']) ? $page = $_GET['page'] : $page = 1);
        $pr = $this->model->getdata($limit, $page);
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
        header("Location: view/admin/index.html?controller=admin");
//        $pr = $this->model->getdata();
//        require_once "view/admin/admin.html";
    }
    public function edit(){
        $id = (int)$_GET["id"];
        $b = $this->model->get($id);
        $img = $b["image"];
        if ($_FILES['img']['name'] != '') {
            $img = __DIR__."/opt/lampp/htdocs/MVC/".$_FILES['img']['name'];
            if ($_FILES['img']['error'] > 0) {
                echo 'not image';
            } else {
                move_uploaded_file($_FILES['img']['tmp_name'], $img);
            }
        } else {
            $img = '';
        }
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
            $des = $_POST["Description"];
            $status = $_POST["status"];
            if ($_FILES['img']['name'] != '') {
                $img = "/opt/lampp/htdocs/MVC/" . $_FILES['img']['name'];

                move_uploaded_file($_FILES['img']['tmp_name'], $img);
            } else {
                $img = '';
            }
            $this->model->add($title,$des,$img,$status);
            $this->index();
        }

    }

}
?>