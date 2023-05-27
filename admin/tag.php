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
        <h3>Kategoriyalar qismi</h3>
        <a href="../tags/add_tag.php" class="btn btn-primary">Add Tag</a>
    </div>
    <table class="table table-striped mt-2 w-100">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Tag nomi</th>
                <th scope="col">Tag edit</th>
                <th scope="col">Tag delete</th>

            </tr>
        </thead>
        <tbody >
            <?php foreach (getTagList($page) as $item) : ?>
                <tr>
                    <td><?= $item['id']  ?> </td>
                    <td><?= $item['name'] ?> </td>
                    <td><a href='../tags/update_tag.php?id=".$item[' id']."' class='btn btn-primary mr-2'>Update</a>
                    <td>
                        <a href='../tags/delete_tag.php?id=".$item[' id']."' class='ml-2 btn btn-danger'>Delete</a>
                    </td>
                    </td>
                </tr>

            <?php endforeach ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($page = 1; $page <= getPagination("tag"); $page++) {  ?>
                <li class="page-item"><a class="page-link" href="/admin/tag.php?page=<?= $page ?>"> <?= $page ?></a></li>
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