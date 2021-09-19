<?php
session_start(); 
if (empty($_SESSION['users'])) {
    header("location:/task_management/user/login");
}
require_once("../../database/db_helper.php");
class getTask extends DB{
    protected $taskID;
    function __construct($taskID)
    {
        $this->taskID = $taskID;
    }
    function getTask()
    {
        $sql = "SELECT * FROM task WHERE id = '$this->taskID'";
        return $this->executeResult($sql);
    }
}
if(!empty($_GET['id'])){
    $taskID = $_GET['id'];
    $task = new getTask($taskID);
    $data = $task->getTask();
}

class updateTask extends DB{
    protected $id;
    protected $taskName;
    protected $taskDetail;
    function __construct($id, $taskName, $taskDetail)
    {
        $this->id = $id;
        $this->taskName = $taskName;
        $this->taskDetail = $taskDetail;
    }
    function updateTask()
    {
        $sql = "UPDATE task SET task_name = '$this->taskName', task_detail = '$this->taskDetail' WHERE id='$this->id'";
        return $this->execute($sql); 
    }
}
if(!empty($_POST['update_task'])){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $detail = $_POST['detail'];
    $update = new updateTask($id, $name, $detail);
    $update->updateTask();
}
?>