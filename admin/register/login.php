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

    <div class="container mt-2">

        <b class="mt-2">
            <?php if (isset($_SESSION['error'])) {
                echo "<div class='alert alert-danger' role='alert'>
                    " . $_SESSION['error'] . "
                    </div>";
                unset($_SESSION['error']);
            }
            if (isset($_SESSION['success'])) {
                header("Location: /admin");
                unset($_SESSION['success']);
            } ?>
        </b>
        <div class="d-flex justify-content-center">

            <form class="w-50 border border-danger mt-5 p-3 rounded" method="post" action="login-check.php">
                <h3>Login page</h3>
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                    <input type="email" class="form-control" value="<?php echo (isset($_SESSION['username']) ? $_SESSION['username'] :  null);
                                                                    unset($_SESSION['username']) ?>" name="log-username" id="exampleInputEmail1" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" name="log-password" id="exampleInputPassword1">
                </div>
                <button type="submit" class="btn btn-primary" name="login">Login</button>
                <a href="./signUp.php">You don't account?</a>
            </form>
        </div>

    </div>
    <?php require_once '../../footer.php'; ?>