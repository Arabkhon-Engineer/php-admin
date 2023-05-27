<?php


// =================== Category ===========================================================
function getCategoryList($page, $withoutLimit = false)
{
    require 'dbconnect.php';
    $limit = 5;
    $offset = ($page -1) * $limit;

    if($withoutLimit){
        $sql = "select * from category";
        $state = $conn->prepare($sql);
    }else{
        $sql = 'select * from category limit :offset, :limit';
        $state = $conn->prepare($sql);
        $state->bindValue(":limit", $limit, PDO::PARAM_INT );
        $state->bindValue(":offset", $offset, PDO::PARAM_INT );
    }
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

function getPagination($tableName){
    require 'dbconnect.php';
    $limit = 5;
    $sql = "select * from ".$tableName;
    $state = $conn->prepare($sql);
    $state->execute();
    $total_rows = $state->rowCount();
    $result =  ceil($total_rows/$limit);
    return $result;
};

function getCategoryById($id)
{
    require 'dbconnect.php';
    $sql = 'select * from category where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->execute();
    $result = $state->fetch(PDO::FETCH_ASSOC);
    return $result;
};

function updateCategory($id, $title){
    require 'dbconnect.php';
    $sql = 'update category set title= :title where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->bindValue(":title", $title,);
    $state->execute();
}

function deleteCategory($id){
    require 'dbconnect.php';
    $sql = 'delete from category where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->execute();
}

//========================== POST ===============================================================

function getPostList($page)
{
    require 'dbconnect.php';
    $limit = 5;
    $offset = ($page -1) * $limit;
    $sql = 'select * from post limit :offset, :limit';
    $state = $conn->prepare($sql);
    $state->bindValue(":limit", $limit, PDO::PARAM_INT );
    $state->bindValue(":offset", $offset, PDO::PARAM_INT );
    $state->execute();
    $result = $state->fetchAll(PDO::FETCH_ASSOC);
    return $result;
};


function addPost($title, $category_id, $author_id, $content){
    require_once 'dbconnect.php';
    if(isset($_POST['post_add'])){
        $sql_insert = "insert into post (title, category_id, visited_count, created_at, author_id, content) values(:title, :category_id, :visited_count,  :created_at, :author_id, :content,) ";
        $state = $conn->prepare($sql_insert);
        $state->bindValue(':title', $title);
        $state->bindValue(':category_id', $category_id);
        $state->bindValue(':author_id', $author_id,);
        $state->bindValue(':content', $content);
        $state->bindValue(':visited_count', 0);
        $state->bindValue(':created_at', date("Y-m-d H:i:s"));
        $state->execute();
    }
};