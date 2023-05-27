<?php
require_once '../header.php';
require_once '../db_helper.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post_row = getPostById($id);
}
if (isset($_POST['post_update'])) {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];
    $author_id = $_POST['author_id'];
    updatePost($id, $title, $author_id, $content, $category_id);
    header('Location: ../admin/news.php');
    exit;
}
$categoryList = getCategoryList(1, true);
$tagList = getTagList(1, true);
$authorList = getAuthorList(1, true);
?>

<form class="container mt-5 p-5 border border-success rounded " method="post" action="#">
    <h3>Posrt Yangilash</h3>
    <div class="mb-3 w-75 ">
        <label for="post_title_input" class="form-label ">Post title</label>
        <input type="text" required class="form-control" value="<?= $post_row['title'] ?>" name="title" id="post_title_input" aria-describedby="emailHelp">
    </div>
    <div class="mb-3 w-75 ">
        <label for="post_contant_input" class="form-label ">Content</label>
        <input type="textarea" required class="form-control" value="<?= $post_row['content'] ?>" name="content" id="post_contant_input" aria-describedby="emailHelp">
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

    <button type="submit" name="post_update" class="btn btn-success">Update</button>
</form>
<?php require_once '../footer.php'  ?>
