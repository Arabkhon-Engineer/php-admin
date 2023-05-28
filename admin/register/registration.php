<?php

session_start();


if(isset($_POST['register'])){
    $reg_firstname = $_POST['reg_firstname'];
    $reg_lastname = $_POST['reg_lastname'];
    $reg_username = $_POST['reg_username'];
    $reg_password = $_POST['reg_password'];
    $reg_confirm_password = $_POST['reg_confirm_password'];
    if($reg_password != $reg_confirm_password){
        $_SESSION['error'] = "password confirm paswordga teng emas";
    }else{
        require '../../dbconnect.php';
        $state = $conn->prepare('select * from user where username = :username');
        $state-> bindValue(':username', $reg_firstname);
        $state->execute();
        if($state->rowCount()>0){
            $_SESSION['error'] = "bunday email mavjud emas";
        }else{
            $role = 'author';
            $reg_password = password_hash($reg_password, PASSWORD_DEFAULT);
            $state = $conn->prepare('insert into user(username, password, firstname, lastname, role) values(:username, :password, :firstname, :lastname, :role )');
            try{
                $state->execute(['username'=> $reg_username, 'password'=>$reg_password, 'firstname'=>$reg_firstname, 'lastname'=>$reg_lastname, 'role'=> $role ]);
                $_SESSION['success'] = "ok";
            }catch(PDOException $e){
                $_SESSION['error'] = $e->getMessage();
            }
        }
    }
}else{
    $_SESSION['error'] = "<h1>Maydonlarni to'ldiring</h1>";
}

header("Location: signUp.php");