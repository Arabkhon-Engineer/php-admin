<?php 
require_once '../header.php';
require '../db_helper.php';
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
};
?>


<?php foreach (getUserList($page) as $item) {
                echo "<tr>";
                echo "<td>" . $item['id'] . "</td>" ."-" ;
                echo "<td>" . $item['username'] . "</td>" ."-" ;
                echo "<td>" . $item['firstname'] . "</td>" ." " ;
                echo "<td>" . $item['lastname'] . "</td>" ."-" ;
                echo "<td><a href='../category/update_category.php?id=".$item['id']."' class='btn btn-primary mr-2'>Update</a><a href='../category/delete_category.php?id=".$item['id']."' class='ml-2 btn btn-danger'>Delete</a> </td>";
                echo "</tr>". "<br>";
            } ?>

<h1>Hello, world!</h1>
<nav aria-label=" Page navigation example">
        <ul class="pagination">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>

            <?php for ($page = 1; $page <= getPagination("user"); $page++) {  ?>
                <li class="page-item"><a class="page-link" href="/admin/user.php?page=<?= $page ?>"> <?= $page ?></a></li>
            <?php } ?>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
<?php require_once '../footer.php'; ?>
