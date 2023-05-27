<?php
require_once '../header.php';
require_once '../db_helper.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $category_row = getCategoryById($id);
    if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
        deleteCategory($id);
        header('Location: ../admin/category.php');
    } elseif (isset($_GET['confirm']) && $_GET['confirm'] === "no") {
        header('Location: ../admin/category.php');
    }
}


?>

<form class="container mt-5 " method="post" action="#">
    <div class="card">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <h5 class="card-title">Bu <b><?=$category_row['title'] ?></b> kategoriyasi</h5>
            <p class="card-text">Rostdan xam shu categoriyani o'chirishga ishonchingiz aniqmi?</p>
            <a href="../category/delete_category.php?id=<?= $id ?>&confirm=no" class="btn btn-danger">Yo'q</a>
            <a href="../category/delete_category.php?id=<?= $id ?>&confirm=yes" class="btn btn-primary">Xa</a>
        </div>
    </div>
    </div>

</form>
<?php require_once '../footer.php'  ?>