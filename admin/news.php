<?php
require_once '../header.php';
require '../db_helper.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
};


?>
<div class="container">
    <div class="d-flex justify-content-between mt-5">
        <h3>Postlar qismi</h3>
        <a href="../post/addPost.php" class=" btn btn-primary">Add Post</a>
    </div>


    <div class="container  w-100 gap-2 d-flex flex-wrap justify-content-between text-center p-2">
        <?php foreach (getPostList($page) as $item) : ?>
            <div class="card text-center w-25  p-1">
                <div class="d-flex justify-content-between p-2">
                    <p>
                        #id: <?= $item['id'] ?>
                    </p>
                    <div class="card-header">
                        <b><?= $item['author_id'] ?></b>
                    </div>
                </div>
                <div class="card-body w-100">
                    <h5 class="card-title"><?= $item['title'] ?></h5>
                    <p class="card-text"><?= $item['content'] ?></p>
                    <a href="#" class="btn btn-primary"><?= $item['category_id'] ?></a>
                </div>
                <div class="card-footer text-body-secondary">
                    <?= $item['created_at'] ?> - <?= $item['visited_count'] ?>
                </div>
                <div class="card-footer text-body-secondary">
                    <a href='../post/update_category.php?id=" . $item[' id'] . "' class='btn btn-primary mr-2'>Update</a><a href='../post/delete_category.php?id=" . $item['id'] . "' class='ml-2 btn btn-danger'>Delete</a> 
                </div>
            </div>
            <?php endforeach  ?>
            </div>
                
    <nav aria-label=" Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                            <?php for ($page = 1; $page <= getPagination("post"); $page++) {  ?>
                                <li class="page-item"><a class="page-link" href="/admin/news.php?page=<?= $page ?>"> <?= $page ?></a></li>
                            <?php } ?>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        </ul>
                        </nav>

                </div>

                <?php require_once '../footer.php'; ?>