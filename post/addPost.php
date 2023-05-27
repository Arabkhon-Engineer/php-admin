<?php
require_once '../header.php';
require_once '../db_helper.php';

if (isset($_POST['post_add'])) {
    $title = $_POST['title'];
    $author_id = $_POST['author_id'];
    $category_id = $_POST['category_id'];
    $content = $_POST['content'];
    addPost($title, $category_id, $author_id, $content);
    header('Location: ../admin/news.php');
    exit;
}


$categoryList = getCategoryList(1, true);
$tagList = getTagList(1, true);
$authorList = getAuthorList(1, true);

?>

<form class="container mt-5 p-5 border border-success rounded " method="post" action="#">
    <h1>Yangi Post qo'shish</h1>
    <div class="mb-3 w-75 ">
        <label for="post_title_input" class="form-label ">Title</label>
        <input type="text" required class="form-control" name="title" id="post_title_input" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 w-75 ">
        <label for="post_contant_input" class="form-label ">Content</label>
        <input type="textarea" required class="form-control" name="content" id="post_contant_input" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 w-75 ">
        <label for="post_category_input" class="form-label ">Kategoriya</label>
        <select class="form-select w-100" aria-label="Default select example" name="category_id">
            <?php foreach($categoryList as $post): ?>
            <option value=<?= $post['id']?>><?= $post['title']?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3 w-75 ">
        <label for="post_category_input" class="form-label ">Tag</label>
        <select class="form-select w-100" aria-label="Default select example" name="author_id">
            <?php foreach($tagList as $post): ?>
            <option value=<?= $post['id']?>><?= $post['name']?></option>
            <?php endforeach ?>
        </select>
    </div>
    <div class="mb-3 w-75 ">
        <label for="post_category_input" class="form-label ">Author FullName</label>
        <select class="form-select w-100" aria-label="Default select example" name="author_id">
            <?php foreach($authorList as $post): ?>
            <option value=<?= $post['id']?>><?= $post['firstname'] ?> - <?= $post['lastname'] ?></option>
            <?php endforeach ?>
        </select>
    </div>
    
    <button type="submit" name="post_add" class="btn btn-primary">Submit</button>
</form>
<?php require_once '../footer.php'  ?>


<!-- 
Muhim xato : 
 Tugallanmagan PDOException: SQLSTATE[42000]: Sintaksis xatosi yoki kirish huquqi buzilishi: 1064 SQL sintaksisida xatolik bor; 
 MariaDB server versiyasiga mos keladigan qoʻllanmani C:\Users\user\Desktop\mohirdev-php\practice\db_helper.php:102 1-qatoridagi ')' yaqinida ishlatish uchun toʻgʻri sintaksisni tekshiring: 
 stek izi: #0 C :\Users\user\Desktop\mohirdev-php\practice\db_helper.php(102): PDOStatement->execute() 
 #1 C:\Users\user\Desktop\mohirdev-php\practice\post\addPost.php( 10): addPost('Enim est sit om...', '15', '1', 'Ipsa delectus s...') 
 №2 {main} C:\Users\user\Desktop\mohirdev- ga tashlangan php\practice\db_helper.php 102 -qatorda -->