<?php
require_once '../header.php';
require_once '../db_helper.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $post_row = getPostById($id);
    if (isset($_GET['confirm']) && $_GET['confirm'] === "yes") {
        deletePost($id);
        header('Location: ../admin/news.php');
    } elseif (isset($_GET['confirm']) && $_GET['confirm'] === "no") {
        header('Location: ../admin/news.php');
    }
}


?>

<form class="container mt-5 " method="post" action="#">
    <div class="card">
        <div class="card-header">
            Deleting
        </div>
        <div class="card-body">
           
            <h5 class="card-title">Bu <b><?= $post_row['title']?></b> post</h5>
            <p class="card-text">Rostdan xam shu categoriyani o'chirishga ishonchingiz aniqmi?</p>
            <a href="../post/delete_post.php?id=<?= $id ?>&confirm=no" class="btn btn-danger">Yo'q</a>
            <a href="../post/delete_post.php?id=<?= $id ?>&confirm=yes" class="btn btn-primary">Xa</a>
        </div>
    </div>
    </div>

</form>
<?php require_once '../footer.php'  ?>