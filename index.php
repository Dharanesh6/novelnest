<?php
include 'db.php';

// Check for search query
$search_query = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';

// Adjust SQL query based on search
if (!empty($search_query)) {
    $sql = "SELECT * FROM ebooks WHERE title LIKE '%$search_query%' OR author LIKE '%$search_query%' OR description LIKE '%$search_query%'";
} else {
    $sql = "SELECT * FROM ebooks";
}

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NovelNest</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #6A5ACD, #00BFFF);
            color: #333;
        }

        /* Navbar */
        .navbar {
            background-color: #000;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            color: white;
        }

        .navbar .logo {
            font-size: 24px;
            font-weight: bold;
            color: #FFD700;
            text-transform: uppercase;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .navbar a:hover {
            color: #FFD700;
        }

        .logout-button {
            padding: 10px 16px;
            background: linear-gradient(to right, #FF6347, #FFD700, #1E90FF);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            transition: background-position 0.4s ease-in-out, box-shadow 0.3s ease, transform 0.3s ease;
            background-size: 200% 100%;
            background-position: right center;
        }

        .logout-button:hover {
            background-position: left center;
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            height: 300px;
            background: url('https://source.unsplash.com/1600x300/?library,books') no-repeat center center/cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            text-shadow: 0 2px 5px rgba(0, 0, 0, 0.5);
            margin-top: 70px; /* To avoid overlap with navbar */
        }

        .hero h1 {
            font-size: 48px;
            margin: 0;
        }

        .hero p {
            font-size: 20px;
            margin: 10px 0 0;
        }

        /* Search Bar */
        .search-bar {
            text-align: center;
            margin: 30px 0;
        }

        .search-bar input[type="text"] {
            width: 80%;
            max-width: 600px;
            padding: 10px 15px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            margin-right: 10px;
        }

        .search-bar button {
            padding: 10px 20px;
            background-color: #FFD700;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: bold;
            color: black;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .search-bar button:hover {
            background-color: #FFC107;
        }

        /* Book Grid */
        .book-list {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
        }

        .book-item {
            background: #fff;
            border-radius: 12px;
            padding: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            text-align: center;
            transition: transform 0.3s, box-shadow 0.3s;
        }

        .book-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.3);
        }

        .book-item img {
            max-width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 8px;
        }

        .book-item h3 {
            margin: 10px 0;
            font-size: 20px;
        }

        .book-item a {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 15px;
            background-color: #FFD700;
            color: black;
            font-weight: bold;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s;
        }

        .book-item a:hover {
            background-color: #FFC107;
        }

        /* Footer */
        footer {
            background-color: #000;
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 30px;
        }

        footer a {
            color: #FFD700;
            text-decoration: none;
            font-weight: bold;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="logo">NovelNest</div>
        <div>
            <a href="index.php">Home</a>
            <a href="Upload Ebook.html">Upload Ebook</a>
            <a href="contact.php">Contact</a>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Welcome to the NovelNest</h1>
            <p>Your gateway to a world of knowledge and imagination.</p>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search-bar">
        <form action="index.php" method="GET">
            <input type="text" name="search" placeholder="Search for ebooks..." value="<?php echo htmlspecialchars($search_query); ?>">
            <button type="submit">Search</button>
        </form>
    </div>

    <!-- Book List -->
    <div class="book-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="book-item">';
                echo '<img src="' . htmlspecialchars($row['image']) . '" alt="' . htmlspecialchars($row['title']) . '">';
                echo '<h3>' . htmlspecialchars($row['title']) . '</h3>';
                echo '<p><strong>Author:</strong> ' . htmlspecialchars($row['author']) . '</p>';
                echo '<a href="' . htmlspecialchars($row['idpath']) . '" target="_blank">Read More</a>';
                echo '</div>';
            }
        } else {
            echo "<p>No books match your search query.</p>";
        }
        ?>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 NovelNest | All Rights Reserved</p>
        <p><a href="privacy.php">Privacy Policy</a> | <a href="terms.php">Terms of Service</a></p>
    </footer>
</body>
</html>
