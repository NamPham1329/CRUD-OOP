<?php
session_start();
if (empty($_SESSION['users'])) {
    header("location:/task/user/login");
}
require_once('index.php');
require_once ("../../database/db_helper.php");
    class newTask extends DB{
        protected $name;
        protected $detail;
        public function __construct($task_name, $task_detail)
        {
            $this->name = $task_name;
            $this->detail = $task_detail;
        }
        public function new()
        {
            if(!empty($this->name) && !empty($this->detail))
            {
                $sql = "INSERT INTO task(id, task_name, task_detail) values (null, '$this->name', '$this->detail')";
                $this->execute($sql);
                return $this->msg = "thanh cong";
            } else {
                return $this->msg = "that bai";
            }
        }
    }
    if(!empty($_POST['add_task']))
    {
        $task_name = $_POST['name'];
        $task_detail = $_POST['detail'];
        $newTask = new newTask($task_name, $task_detail);
        $data = $newTask->new();
    }
?>