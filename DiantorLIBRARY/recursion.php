<?php
// ================================
// Part I - Recursive Library Display
// ================================

// Simulated nested library categories
$library = [
    "Fiction" => [
        "Fantasy" => ["Harry Potter", "The Hobbit"],
        "Mystery" => ["Sherlock Holmes", "Gone Girl"]
    ],
    "Non-Fiction" => [
        "Science" => ["A Brief History of Time", "The Selfish Gene"],
        "Biography" => ["Steve Jobs", "Becoming"]
    ]
];

// Recursive function to display the library
function displayLibrary($library, $indent = 0) {
    foreach ($library as $key => $value) {
        echo str_repeat("&nbsp;&nbsp;", $indent) . "<strong>$key</strong><br>";
        if (is_array($value)) {
            displayLibrary($value, $indent + 2);
        } else {
            echo str_repeat("&nbsp;&nbsp;", $indent + 2) . "$value<br>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Library Organizer - Recursion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light text-dark p-5">
<div class="container">
    <div class="card shadow-sm p-4">
        <h2 class="text-center mb-4 text-primary">📚 Digital Library Organizer - Recursive Display</h2>
        <div class="p-3 bg-white border rounded">
            <?php displayLibrary($library); ?>
        </div>
    </div>
</div>
</body>
</html>
