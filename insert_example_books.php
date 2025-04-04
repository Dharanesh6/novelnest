<?php
include 'db.php';

// Example book 1
$title1 = 'Example Book 1';
$author1 = 'Author One';
$description1 = 'This is a description of Example Book 1.';
$file_path1 = 'uploads/example1.pdf'; // You need to upload this file manually

// Example book 2
$title2 = 'Example Book 2';
$author2 = 'Author Two';
$description2 = 'This is a description of Example Book 2.';
$file_path2 = 'uploads/example2.pdf'; // You need to upload this file manually

// Insert first book
$sql1 = "INSERT INTO ebooks (title, author, description, file_path) VALUES (?, ?, ?, ?)";
$stmt1 = $conn->prepare($sql1);
$stmt1->bind_param("ssss", $title1, $author1, $description1, $file_path1);
$stmt1->execute();

// Insert second book
$sql2 = "INSERT INTO ebooks (title, author, description, file_path) VALUES (?, ?, ?, ?)";
$stmt2 = $conn->prepare($sql2);
$stmt2->bind_param("ssss", $title2, $author2, $description2, $file_path2);
$stmt2->execute();

echo "Two example books have been added to the database!";
?>
