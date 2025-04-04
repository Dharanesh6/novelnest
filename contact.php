<?php
session_start();
include 'db.php'; // Include your database connection

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert the data into the contact_info table
    $sql = "INSERT INTO contact_info (name, email, message) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $message);

    // Check if the query executed successfully
    if ($stmt->execute()) {
        // If successful, show success message
        $success_message = "Thank you! Your message has been submitted.";
    } else {
        $error_message = "There was an error submitting your message. Please try again later.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - NovelNest</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        header {
            background-color: #1a1a1a;
            color: #FFD700;
            padding: 20px;
            text-align: center;
        }

        footer {
            background-color: #1a1a1a;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            width: 100%;
            bottom: 0;
        }

        .content {
            max-width: 900px;
            margin: 40px auto;
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        h1, h2 {
            color: #333;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input, textarea {
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        button {
            padding: 10px 16px;
            background-color: #FFD700;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            color: black;
            cursor: pointer;
        }

        button:hover {
            background-color: #FFC107;
        }

        .message {
            padding: 10px;
            text-align: center;
            margin: 10px 0;
            border-radius: 5px;
        }

        .success {
            background-color: #DFF0D8;
            color: #3C763D;
        }

        .error {
            background-color: #F2DEDE;
            color: #D9534F;
        }
    </style>
</head>
<body>

<header>
    <h1>NovelNest</h1>
    <p>We'd love to hear from you!</p>
</header>

<div class="content">
    <h2>Contact Us</h2>
    <p>If you have any questions, feedback, or concerns, feel free to reach out to us using the form below. We are always happy to assist you!</p>

    <!-- Show success or error message -->
    <?php if (isset($success_message)): ?>
        <div class="message success"><?php echo $success_message; ?></div>
    <?php elseif (isset($error_message)): ?>
        <div class="message error"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form action="contact.php" method="POST">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <textarea name="message" placeholder="Your Message" rows="4" required></textarea>
        <button type="submit">Send Message</button>
    </form>
</div>

<footer>
    <p>&copy; 2025 NovelNest | All Rights Reserved</p>
</footer>

</body>
</html>
