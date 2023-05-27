<?php 
require_once '../header.php';
require_once '../db_helper.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $tag_row = getTagById($id);
}
if(isset($_POST['tag_update'])){
    $title = $_POST['tag_title'];
    updateTag($id, $title);
    header('Location: ../admin/tag.php'); exit;
}



?>

    <form class="container mt-5 "  method="post" action="#">
        <div class="mb-3 w-75 ">
      <label for="category_name_input" class="form-label ">Tag yangilash</label>
      <input type="text" required class="form-control" value="<?= $tag_row['title'] ?>" name="tag_title" id="category_name_input" aria-describedby="tagHelps">
    </div>
    
    <button type="submit" name="tag_update" class="btn btn-success">Update</button>
</form>
<?php require_once '../footer.php'  ?>