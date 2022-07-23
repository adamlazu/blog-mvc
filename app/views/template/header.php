<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $data['title']; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo BASEURL; ?>">Go-Blog</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo BASEURL; ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL; ?>/article">Articles</a>
        </li>
        <?php if(isset($_SESSION['user'])){ ?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL; ?>/article/myarticle">My Articles</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL; ?>/user/logout">Logout</a>
        </li>
        <?php }else{?>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo BASEURL; ?>/user/loginpage">Login</a>
        </li>
        <?php } ?>
      </ul>
    </div>
  </div>
</nav>