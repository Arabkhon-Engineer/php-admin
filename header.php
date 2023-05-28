
<?php
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

<?php
if(!isset($_SESSION['loginIn'])){
  header('Location: /admin/register/login.php');
}

?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/admin">Asosiy Sahifa</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/news.php">Yangiliklar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/category.php">Kategoriyalar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/admin/tag.php">Taglar</a>
            </li>
          </ul>
          <div class="d-flex">
            <form class="d-flex" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a class="btn btn-warning" href="/admin/register/logout.php"><b>LogOut</b></a>
          </div>
        </div>
      </div>
    </div>
  </nav>