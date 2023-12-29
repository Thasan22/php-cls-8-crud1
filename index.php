<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POST SYSTEM</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
   <!-- NAVEBAR STARTS HERE -->
    <nav class="navbar navbar-expand-lg bg-info">
        <div class="container">
            <a class="navbar-brand" href="#">Post System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myCustomNav" aria-controls="myCustomNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="hover collapse navbar-collapse" id="myCustomNav">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./index.php">Add Post</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="./allPosts.php">All Posts</a>
              </li>
            </div>
        </div>
      </nav>
    <!-- NAVEBAR ENDS HERE -->


    <!-- USER FORM STARTS -->
    <div class="card col-lg-5 mx-auto mt-5">
        <div class="card-header">Add Post</div>
        <div class="card-body">

        <form action="./addPost.php" method="post">
            <input value="<?= $_SESSION['old']['title'] ?? '' ?>" name="title" type="text" placeholder="Post Title" class="form-control my-3">
            <?php
            if(isset($_SESSION["error_check"]["title_error"])){
                ?>
            <span class="text-danger">
                <?= $_SESSION["error_check"]["title_error"];?>
            </span>
            <?php
            }
            ?>

            <textarea name="details" class="form-control my-3" placeholder="Text Details"><?= $_SESSION['old']['details'] ?? '' ?></textarea>
            <?php
            if(isset($_SESSION["error_check"]["details_error"])){
            ?>
                <span class="text-danger">
                <?= $_SESSION["error_check"]["details_error"];?>
                </span>
            <?php
            }
            ?>
            
            <input value="<?= $_SESSION['old']['author'] ?? '' ?>" name="author" type="text" placeholder="Post Author" class="form-control my-3">
            <?php
            if(isset($_SESSION["error_check"]["author_error"])){
            ?>
                <span class="text-danger">
                <?= $_SESSION["error_check"]["author_error"];?>
                </span>
            <?php
            }
            ?>

            <br>

            <button type="submit" class="btn btn-primary">Submit</button><br>
            <span class="text-success">
              <?=isset($_SESSION['success']) ? $_SESSION['success'] : ""?>
            </span>
        </form>

        </div>
    </div>
    <!-- USER FORM ENDS -->

<script src="bootstrap.bundle.min.js"></script>
</body>
</html>


<?php
session_unset();
?>