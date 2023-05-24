<?php

function getCategoryList($page)
{
    require 'dbconnect.php';
    $limit = 5;
    $offset = ($page -1) * $limit;
    $sql = 'select * from category limit :offset, :limit';
    $state = $conn->prepare($sql);
    $state->bindValue(":limit", $limit, PDO::PARAM_INT );
    $state->bindValue(":offset", $offset, PDO::PARAM_INT );
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};

function addCategory($title){
    require_once 'dbconnect.php';
    if(isset($_POST['cat_add'])){
        $sql_insert = "insert into category (title) value(:title) ";
        $state = $conn->prepare($sql_insert);
        $state->bindValue(':title', $title);
        $state->execute();
    }
};

function getPagination(){
    require 'dbconnect.php';
    $limit = 5;
    $sql = 'select * from category';
    $state = $conn->prepare($sql);
    $state->execute();
    $total_rows = $state->rowCount();
    $result =  ceil($total_rows/$limit);
    return $result;
};