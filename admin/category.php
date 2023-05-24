<?php
require_once '../header.php';
require '../dbconnect.php';
$sql = 'select * from category';
$state = $conn->prepare($sql);
$state->execute();
$result = $state->fetchAll(PDO::FETCH_ASSOC);
echo "<pre>";
// print_r($result);

?>
<div class="container">
    <h3>Kategoriyalar qismi</h3>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#id</th>
                <th scope="col">Kategoriya nomi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $item) {
                echo "<tr>";
                echo "<td>" . $item['id'] . "</td>";
                echo "<td>" . $item['title'] . "</td>";
                echo "</tr>";
            } ?>
        </tbody>
    </table>
    <a href="../layout/addCategory.php" class="text-primary"><button type="button" class="btn btn-primary">Add Kategoriya</button></a>

</div>

<?php require_once '../footer.php'; ?>