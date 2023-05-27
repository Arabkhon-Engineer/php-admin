<?php 
require_once '../header.php';
require_once '../db_helper.php';

if(isset($_POST['cat_add'])){
    $title = $_POST['category_title'];
    addCategory($title);
    header('Location: ../admin/category.php'); exit;
}

?>

    <form class="container mt-5 "  method="post" action="#">
        <div class="mb-3 w-75 ">
        <h1>Yangi Kategoriya qo'shish</h1>

      <label for="category_name_input" class="form-label ">Kategoriya qo'shish</label>
      <input type="text" required class="form-control"  name="category_title" id="category_name_input" aria-describedby="emailHelp">
    </div>
    
    <button type="submit" name="cat_add" class="btn btn-primary">Submit</button>
</form>
<?php require_once '../footer.php'  ?>