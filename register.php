<?php
include 'db.php';

$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password_hash = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security

    // Insert user into the users table
    $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $username, $email, $password_hash);

    if ($stmt->execute()) {
        $success_message = "Registration successful! You can now <a href='login.php'>login</a>.";
    } else {
        $error_message = "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #4facfe, #00f2fe);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            color: #333;
        }

        .container {
            max-width: 400px;
            width: 100%;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .container h2 {
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: #fff;
            margin: 0;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }

        .form-wrapper {
            padding: 30px;
        }

        form {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4facfe;
            box-shadow: 0 0 8px rgba(79, 172, 254, 0.6);
        }

        input[type="submit"] {
            padding: 12px;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            color: white;
            font-size: 18px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.4s ease, transform 0.3s ease;
        }

        input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(38, 127, 255, 0.3);
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        a {
            color: #2575fc;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }

        .error-message,
        .success-message {
            text-align: center;
            font-size: 14px;
            margin-top: 20px;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .error-message {
            color: red;
            background-color: #f8d7da;
        }

        .success-message {
            color: green;
            background-color: #d4edda;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Register</h2>
        <div class="form-wrapper">
            <!-- Display success or error message -->
            <?php if ($success_message): ?>
                <p class="success-message"><?php echo $success_message; ?></p>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <p class="error-message"><?php echo $error_message; ?></p>
            <?php endif; ?>

            <form action="register.php" method="POST">
                <input type="text" name="username" placeholder="Enter Username" required>
                <input type="email" name="email" placeholder="Enter Email" required>
                <input type="password" name="password" placeholder="Enter Password" required>
                <input type="submit" value="Register">
            </form>
            <p>Already have an account? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
