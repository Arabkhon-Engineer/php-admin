<?php
require '../../db_helper.php';

session_start();

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="admin php only-php mysql practice crm post-panel">
    <meta name="keywords" content="admin php only-php mysql practice crm post-panel">
    <title>Admin panel only php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div class="container  m-5">
        <div class="text-center ">

            <h1>Sign Up page</h1>
            <b class="mt-2">
                <?php if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger' role='alert'>
                    " . $_SESSION['error'] . "
                    </div>";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    header("Location: login.php");
                    unset($_SESSION['success']);
                } ?>
            </b>
        </div>
        <div class="d-flex justify-content-center">

            <form class="w-50 border border-danger mt-2 p-3 rounded" method="post" action="registration.php">
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" class="form-control" name="reg_username" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputConfirmPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="reg_password" id="exampleInputConfirmPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="reg_confirm_password" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputFirstName" class="form-label">Firstname</label>
                    <input type="text" class="form-control" name="reg_firstname" id="exampleInputFirstName">
                </div>
                <div class="mb-3">
                    <label for="exampleInputLastName" class="form-label">Lastname</label>
                    <input type="text" class="form-control" name="reg_lastname" id="exampleInputLastName">
                </div>
                <button type="submit" class="btn btn-primary" name="register">Register</button>
                <a href="login.php">If you have account</a>
            </form>
        </div>

    </div>
    <?php require_once '../../footer.php'; ?>