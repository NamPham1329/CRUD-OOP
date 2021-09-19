<?php
    require_once('index.php');
    require_once('../../database/db_helper.php');
    class Register extends DB{
        protected $username;
        protected $password;
        protected $confirm_psw;
        function __construct($username, $password, $confirm_psw)
        {
            $this->username = $username;
            $this->password =$password;
            $this->confirm_psw = $confirm_psw;
        }
        function register()
        {
            if(!empty($this->username) && !empty($this->username) && !empty($this->username) && $this->password === $this->confirm_psw){
                $pass = md5($this->password);
                $sql = "INSERT INTO user(id, username, password) values (null, '$this->username', '$pass')";
                return $this->execute($sql);
            } 
        }
    }
    if(!empty($_POST['register'])){
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $confirm = $_POST['confirm_pwd'];
        $register = new Register($user, $pass, $confirm);
        return $register->register();
    }
?>