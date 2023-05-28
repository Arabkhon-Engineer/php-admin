<?php


// =================== Category ===========================================================
function getCategoryList($page, $withoutLimit = false)
{
    require 'dbconnect.php';
    $limit = 4;
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
    return $state->fetchAll(PDO::FETCH_ASSOC);
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

function getAuthorList($page, $withoutLimit = false)
{
    require 'dbconnect.php';
    $limit = 4;
    $offset = ($page -1) * $limit;

    if($withoutLimit){
        $sql = "select * from user";
        $state = $conn->prepare($sql);
    }else{
        $sql = 'select * from user limit :offset, :limit';
        $state = $conn->prepare($sql);
        $state->bindValue(":limit", $limit, PDO::PARAM_INT );
        $state->bindValue(":offset", $offset, PDO::PARAM_INT );
    }
    $state->execute();
    return $state->fetchAll(PDO::FETCH_ASSOC);
};

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
        $sql_insert = "insert into post (title, category_id, author_id, content, visited_count, created_at) values(:title, :category_id, :author_id, :content, :visited_count,  :created_at) ";
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


function getAuthor($author_id){
    require 'dbconnect.php';
    $sql = 'select * from user where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $author_id, PDO::PARAM_INT );
    $state->execute();
    $result = $state->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function getPostById($id)
{
    require 'dbconnect.php';
    $sql = 'select * from post where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->execute();
    $result = $state->fetch(PDO::FETCH_ASSOC);
    return $result;
};


function updatePost($id, $title, $author_id, $content, $category_id){
    require 'dbconnect.php';
    $sql = 'update post set title= :title, author_id = :author_id, content= :content, category_id= :category_id   where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->bindValue(":title", $title,);
    $state->bindValue(":author_id", $author_id,);
    $state->bindValue(":content", $content,);
    $state->bindValue(":category_id", $category_id,);
    $state->execute();
}


function deletePost($id){
    require 'dbconnect.php';
    $sql = 'delete from post where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->execute();
}

// ===================== tag =========================================

function getTagList($page, $withoutLimit = false)
{
    require 'dbconnect.php';
    $limit = 5;
    $offset = ($page -1) * $limit;

    if($withoutLimit){
        $sql = "select * from tag";
        $state = $conn->prepare($sql);
    }else{
        $sql = 'select * from tag limit :offset, :limit';
        $state = $conn->prepare($sql);
        $state->bindValue(":limit", $limit, PDO::PARAM_INT );
        $state->bindValue(":offset", $offset, PDO::PARAM_INT );
    }
    $state->execute();
    return $state->fetchAll(PDO::FETCH_ASSOC);
};

function addTag($title){
    require_once 'dbconnect.php';
    if(isset($_POST['tag_add'])){
        $sql_insert = "insert into tag (name) value(:name) ";
        $state = $conn->prepare($sql_insert);
        $state->bindValue(':name', $title);
        $state->execute();
    }
};

function getTagById($id)
{
    require 'dbconnect.php';
    $sql = 'select * from tag where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->execute();
    $result = $state->fetch(PDO::FETCH_ASSOC);
    return $result;
};

function updateTag($id, $title){
    require 'dbconnect.php';
    $sql = 'update tag set title= :title where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->bindValue(":title", $title,);
    $state->execute();
}

function deleteTag($id){
    require 'dbconnect.php';
    $sql = 'delete from tag where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->execute();
}



// ===================== user ===============================================

function getUserList($page, $withoutLimit = false)
{
    require 'dbconnect.php';
    $limit = 10;
    $offset = ($page -1) * $limit;

    if($withoutLimit){
        $sql = "select * from user";
        $state = $conn->prepare($sql);
    }else{
        $sql = 'select * from user limit :offset, :limit';
        $state = $conn->prepare($sql);
        $state->bindValue(":limit", $limit, PDO::PARAM_INT );
        $state->bindValue(":offset", $offset, PDO::PARAM_INT );
    }
    $state->execute();
    return $state->fetchAll(PDO::FETCH_ASSOC);
};



function addUser($username, $password, $firstname, $lastname){
    require_once 'dbconnect.php';
    if(isset($_POST['post_add'])){
        $sql_insert = "insert into user (username, password, firstname, lastname, created_at) values(:username, :password, :firstname, :lastname, :created_at) ";
        $state = $conn->prepare($sql_insert);
        $state->bindValue(':username', $username);
        $state->bindValue(':password', $password);
        $state->bindValue(':firstname', $firstname,);
        $state->bindValue(':lastname', $lastname);
        $state->bindValue(':created_at', date("Y-m-d H:i:s"));
        $state->execute();
    }
};

function getUserById($id)
{
    require 'dbconnect.php';
    $sql = 'select * from user where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->execute();
    $result = $state->fetch(PDO::FETCH_ASSOC);
    return $result;
};


function updateUser($username, $password, $firstname, $lastname){
    require 'dbconnect.php';
    $sql = 'update user set username= :username, password = :password, firstname= :firstname, lastname= :lastname   where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->bindValue(':username', $username);
    $state->bindValue(':password', $password);
    $state->bindValue(':firstname', $firstname,);
    $state->bindValue(':lastname', $lastname);
    $state->bindValue(':created_at', date("Y-m-d H:i:s"));
    $state->execute();
}


function deleteUser($id){
    require 'dbconnect.php';
    $sql = 'delete from user where id= :id';
    $state = $conn->prepare($sql);
    $state->bindValue(":id", $id, PDO::PARAM_INT );
    $state->execute();
}