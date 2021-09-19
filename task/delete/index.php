<?php
    session_start(); 
    if (empty($_SESSION['users'])) {
        header("location:/task_management/user/login");
    }
    require_once("../../database/db_helper.php");
    class deleteTask extends DB{
        protected $id;
        function __construct($id)
        {
            $this->id = $id;
        }
        function delete()
        {
            $sql = "DELETE FROM task WHERE id = '$this->id'";
            $this->execute($sql);
        }
    }
    print_r($_GET);
    if(!empty($_GET['id']))
    {
        $id = $_GET['id'];
        $delete = new deleteTask($id);
        $delete->delete();
        header('Location: /task_management/task/list');
    }
?>