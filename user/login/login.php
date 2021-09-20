<?php
require_once('index.php');
require_once('../../database/db_helper.php');

session_start(); 
if (!empty($_SESSION["users"])){
    header('Location: /task/task/list');
}
class Login extends DB
{   
    public $msg;
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
            if(!empty($this->data[0]))
            {
                $_SESSION['users'] = $this->data[0];
                header('Location: /task/task/list');
                die();
            } 
        } 
    }
}


if(!empty($_POST['login'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $login = new Login($user, $pass);
    $data1 = $login->login();
    
}
?>