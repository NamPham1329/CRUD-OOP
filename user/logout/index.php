<?php
if(empty($_SESSION)){
    session_start();
}
class Logout{
    public function logout()
    {
        if(!empty($_POST['logout'])){
            session_destroy();
            header('Location: /task_management/user/login');
        } 
    }
}
$logout = new Logout();
return $logout->logout();
?>