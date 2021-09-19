<?php
require_once('index.php');
require_once('../../database/db_helper.php');
session_start(); 
class Login extends DB
{   
    protected $username;
    protected $password;
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = md5($password);
    }
    function login()
    {
        if(!empty($this->username) && !empty($this->password))
        {   
            $sql = "SELECT * FROM user WHERE username = '$this->username' and password = '$this->password'";
            $this->executeResult($sql);
            if(count($this->data) > 0)
            {
                $_SESSION['users'] = $this->data[0];
                header('Location: /task_management/task/list');
                die();
            }    
        }

    }
}
if(!empty($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $login = new Login($user, $pass);
    return $login->login();
}
?>