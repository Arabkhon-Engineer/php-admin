<?php
session_start();

if(isset($_SESSION['loginIn'])){
    unset($_SESSION['loginIn']);
    unset($_SESSION['success']);
    header('Location: /admin');
}

?>



<?php require_once '../../footer.php'; ?>