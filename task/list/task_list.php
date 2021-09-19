<?php
session_start(); 
if (empty($_SESSION['users'])) {
    header("location:/task_management/user/login");
}
require_once("../../database/db_helper.php");

class listTask extends DB{
    public function getList()
    {
        $sql = "SELECT * FROM task";
        return $this->executeResult($sql);
    }
}
$list = new listTask();
$data = $list->getList();
?>