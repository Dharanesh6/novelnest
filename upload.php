<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];

    // Handle file upload for the ebook file
    $file = $_FILES['file'];
    $file_name = basename($file['name']);
    $target_dir = "uploads/";
    $target_file = $target_dir . $file_name;

    // Handle file upload for the book cover image
    $cover_image = $_FILES['cover_image'];
    $cover_name = basename($cover_image['name']);
    $cover_target = "uploads/covers/";
    $cover_file = $cover_target . $cover_name;

    // Ensure the upload directories exist
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0755, true);
    }

    if (!is_dir($cover_target)) {
        mkdir($cover_target, 0755, true);
    }

    // Debugging: Output file information for ebook
    if ($file['error'] !== UPLOAD_ERR_OK) {
        echo "<p>Error during ebook file upload: " . $file['error'] . "</p>";
        print_r($_FILES['file']);
        exit;
    }

    // Debugging: Output file information for cover image
    if ($cover_image['error'] !== UPLOAD_ERR_OK) {
        echo "<p>Error during cover image upload: " . $cover_image['error'] . "</p>";
        print_r($_FILES['cover_image']);
        exit;
    }

    // Move uploaded ebook file to the server
    if (move_uploaded_file($file['tmp_name'], $target_file) && move_uploaded_file($cover_image['tmp_name'], $cover_file)) {
        // Insert ebook details into the database, including the cover image path
        $sql = "INSERT INTO ebooks (title, author, description, file_path, cover_image) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssss", $title, $author, $description, $target_file, $cover_file);

        if ($stmt->execute()) {
            echo "<div class='success-message'>Ebook uploaded successfully!</div>";
        } else {
            echo "<div class='error-message'>Error: " . $stmt->error . "</div>";
        }

        $stmt->close();
    } else {
        echo "<p>Error moving uploaded files to the target directory.</p>";
        print_r($_FILES); // Debugging
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Ebook</title>
</head>
<body>

    <div class="container">
        <h2>Upload an Ebook</h2>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <label for="title">Title:</label>
            <input type="text" name="title" id="title" required><br>

            <label for="author">Author:</label>
            <input type="text" name="author" id="author" required><br>

            <label for="description">Description:</label>
            <textarea name="description" id="description" required></textarea><br>

            <label for="file">Ebook File:</label>
            <input type="file" name="file" id="file" accept=".pdf, .epub" required><br>

            <label for="cover_image">Cover Image:</label>
            <input type="file" name="cover_image" id="cover_image" accept="image/*" required>
            <div class="cover-box">Cover Image (Optional)</div><br>

            <input type="submit" value="Upload Ebook">
        </form>

        <!-- Display success or error messages -->
        <?php if (isset($success_message)) { echo "<div class='success-message'>$success_message</div>"; } ?>
        <?php if (isset($error_message)) { echo "<div class='error-message'>$error_message</div>"; } ?>
    </div>

</body>
</html>
