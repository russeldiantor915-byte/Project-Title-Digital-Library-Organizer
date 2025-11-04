<?php
// ================================
// Part II - Hash Table for Book Details
// ================================

// Associative array (Hash Table) for book info
$bookInfo = [
    "Harry Potter" => ["author" => "J.K. Rowling", "year" => 1997, "genre" => "Fantasy"],
    "The Hobbit" => ["author" => "J.R.R. Tolkien", "year" => 1937, "genre" => "Fantasy"],
    "Sherlock Holmes" => ["author" => "Arthur Conan Doyle", "year" => 1892, "genre" => "Mystery"],
    "Gone Girl" => ["author" => "Gillian Flynn", "year" => 2012, "genre" => "Mystery"],
    "A Brief History of Time" => ["author" => "Stephen Hawking", "year" => 1988, "genre" => "Science"],
    "The Selfish Gene" => ["author" => "Richard Dawkins", "year" => 1976, "genre" => "Science"],
    "Steve Jobs" => ["author" => "Walter Isaacson", "year" => 2011, "genre" => "Biography"],
    "Becoming" => ["author" => "Michelle Obama", "year" => 2018, "genre" => "Biography"]
];

// Function to get book info by title
function getBookInfo($title, $bookInfo) {
    if (isset($bookInfo[$title])) {
        $info = $bookInfo[$title];
        echo "<strong>Title:</strong> $title<br>";
        echo "<strong>Author:</strong> {$info['author']}<br>";
        echo "<strong>Year:</strong> {$info['year']}<br>";
        echo "<strong>Genre:</strong> {$info['genre']}<br>";
    } else {
        echo "<p class='text-danger'>Book not found.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Library Organizer - Hash Table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="text-center text-primary mb-4">📚 Book Information Lookup</h2>
        <form method="get" class="mb-3">
            <label for="title" class="form-label">Enter Book Title:</label>
            <input type="text" name="title" id="title" class="form-control" placeholder="e.g. The Hobbit" required>
            <button class="btn btn-primary mt-3">Search</button>
        </form>
        <div class="bg-white border p-3 rounded">
            <?php
            if (isset($_GET['title'])) {
                $title = trim($_GET['title']);
                getBookInfo($title, $bookInfo);
            }
            ?>
        </div>
    </div>
</div>
</body>
</html>
