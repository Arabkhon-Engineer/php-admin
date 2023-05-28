<?php

session_start();


if(isset($_POST['login'])){
    $log_name = $_POST['log-username'];
    $log_password = $_POST['log-password'];
    require '../../dbconnect.php';

    $state = $conn->prepare('select * from user where username = :username');
    $state->execute(['username'=> $log_name]);

    if($state->rowCount()>0){
        $user = $state->fetch();
        var_dump($log_password);
        var_dump($user['password']);
        if(password_verify($log_password, $user['password'])){
            $_SESSION['success'] = "xammasi to'gri";
            $_SESSION['loginIn'] = "1";
            header('Location: /admin');
        }else{
            $_SESSION['username'] =$log_name ;
            $_SESSION['password'] = $log_password;
            $_SESSION['error'] = "Parol xato!!!";
        }
    }else{
        $_SESSION['username'] =$log_name ;
        $_SESSION['password'] = $log_password;
        $_SESSION['error'] = "bunday email ro'yxatdan o'tmagan";
    }

}

header('Location: login.php');