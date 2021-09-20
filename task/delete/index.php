<?php
    session_start();
    if (empty($_SESSION['users'])) {
        header("location:/task/user/login");
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
            header('Location: /task/task/list');
        }
    }
    
    if(!empty($_POST['delete']))
    {
        $id = $_POST['delete'];
        $delete = new deleteTask($id);
        return $delete->delete(); 
    }
?>