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
        <a href="../layout/addCategory.php" class=" "><button type="button" class="btn btn-primary">Add Kategoriya</button></a>
    </div>
    <table class="table table-striped ">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Kategoriya nomi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach (getCategoryList($page) as $item) {
                echo "<tr>";
                echo "<td>" . $item['id'] . "</td>";
                echo "<td>" . $item['title'] . "</td>";
                echo "</tr>";
            } ?>
        </tbody>
    </table>
    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <?php for ($page = 1; $page <= getPagination(); $page++) {  ?>
                <li class="page-item"><a class="page-link" href="/admin/category.php?page=<?= $page?>"> <?= $page ?></a></li>
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