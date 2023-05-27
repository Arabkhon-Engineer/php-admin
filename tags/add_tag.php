<?php 
require_once '../header.php';
require_once '../db_helper.php';

if(isset($_POST['tag_add'])){
    $title = $_POST['tag_title'];
    addTag($title);
    header('Location: ../admin/tag.php'); exit;
}

?>

    <form class="container mt-5 "  method="post" action="#">
        <div class="mb-3 w-75 ">
        <h1>Yangi Tag qo'shish</h1>

      <label for="category_name_input" class="form-label ">Tag qo'shish</label>
      <input type="text" required class="form-control"  name="tag_title" id="category_name_input" aria-describedby="emailHelp">
    </div>
    
    <button type="submit" name="tag_add" class="btn btn-primary">Submit</button>
</form>
<?php require_once '../footer.php'  ?>