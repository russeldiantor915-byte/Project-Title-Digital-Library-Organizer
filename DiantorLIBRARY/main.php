<?php
include 'recursion.php';
include 'hashtable.php';
include 'bst.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Digital Library Organizer - Main</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container">
  <div class="text-center mb-4">
    <h1 class="text-primary">📖 Digital Library Organizer</h1>
    <p class="lead">Recursion + Hash Table + BST Integration</p>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card p-3">
        <h5 class="text-center">Library Categories</h5>
        <?php displayLibrary($library); ?>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3">
        <h5 class="text-center">Book Info</h5>
        <form method="get">
          <input type="text" name="title" class="form-control" placeholder="Enter title...">
          <button class="btn btn-primary w-100 mt-2">Get Info</button>
        </form>
        <div class="mt-3"><?php if (isset($_GET['title'])) getBookInfo($_GET['title'], $bookInfo); ?></div>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card p-3">
        <h5 class="text-center">Search in BST</h5>
        <form method="get">
          <input type="text" name="search" class="form-control" placeholder="Search title...">
          <button class="btn btn-success w-100 mt-2">Search</button>
        </form>
        <div class="mt-3">
          <?php
          $tree = new BinarySearchTree();
          foreach (array_keys($bookInfo) as $book) $tree->insert($book);
          if (isset($_GET['search'])) {
              $title = trim($_GET['search']);
              echo $tree->search($title)
                  ? "<p class='text-success'>Found: $title</p>"
                  : "<p class='text-danger'>Not Found: $title</p>";
          }
          ?>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
