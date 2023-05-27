<?php 
require_once '../header.php';
require_once '../db_helper.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $category_row = getCategoryById($id);
}
if(isset($_POST['cat_update'])){
    $title = $_POST['category_title'];
    updateCategory($id, $title);
    header('Location: ../admin/news.php'); exit;
}


?>

    <form class="container mt-5 "  method="post" action="#">
        <div class="mb-3 w-75 ">
      <label for="category_name_input" class="form-label ">Kategoriya qo'shish</label>
      <input type="text" required class="form-control" value="<?= $category_row['title'] ?>" name="category_title" id="category_name_input" aria-describedby="emailHelp">
    </div>
    
    <button type="submit" name="cat_update" class="btn btn-success">Update</button>
</form>
<?php require_once '../footer.php'  ?>