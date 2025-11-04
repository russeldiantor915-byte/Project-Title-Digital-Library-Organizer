<?php
// ================================
// Part III - Binary Search Tree
// ================================

class Node {
    public $data;
    public $left;
    public $right;
    public function __construct($data) {
        $this->data = $data;
        $this->left = null;
        $this->right = null;
    }
}

class BinarySearchTree {
    public $root;
    public function __construct() {
        $this->root = null;
    }

    public function insert($data) {
        $this->root = $this->insertRec($this->root, $data);
    }

    private function insertRec($node, $data) {
        if ($node == null) return new Node($data);
        if ($data < $node->data) $node->left = $this->insertRec($node->left, $data);
        elseif ($data > $node->data) $node->right = $this->insertRec($node->right, $data);
        return $node;
    }

    public function search($data) {
        return $this->searchRec($this->root, $data);
    }

    private function searchRec($node, $data) {
        if ($node == null) return false;
        if ($data == $node->data) return true;
        return $data < $node->data ? $this->searchRec($node->left, $data) : $this->searchRec($node->right, $data);
    }

    public function inorderTraversal($node) {
        if ($node != null) {
            $this->inorderTraversal($node->left);
            echo $node->data . "<br>";
            $this->inorderTraversal($node->right);
        }
    }
}

// Create and populate BST
$tree = new BinarySearchTree();
$books = ["Harry Potter", "The Hobbit", "Sherlock Holmes", "Gone Girl", "A Brief History of Time", "Becoming"];
foreach ($books as $book) $tree->insert($book);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Library Organizer - BST</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="text-center text-primary mb-4">🌲 Binary Search Tree - Book Titles</h2>

        <h5>Inorder Traversal (Alphabetical):</h5>
        <div class="bg-white border rounded p-3 mb-4">
            <?php $tree->inorderTraversal($tree->root); ?>
        </div>

        <form method="get">
            <label for="search" class="form-label">Search for a book:</label>
            <input type="text" id="search" name="search" class="form-control" placeholder="e.g. The Hobbit" required>
            <button class="btn btn-success mt-3">Search</button>
        </form>

        <?php
        if (isset($_GET['search'])) {
            $title = trim($_GET['search']);
            $found = $tree->search($title);
            echo "<p class='mt-3 fw-bold'>" . ($found ? "✅ '$title' Found!" : "❌ '$title' Not Found.") . "</p>";
        }
        ?>
    </div>
</div>
</body>
</html>
