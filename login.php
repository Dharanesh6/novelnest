<?php
session_start();
include 'db.php'; // Include the database connection file

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    // Query to fetch user details
    $sql = "SELECT id, username, password FROM users WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Redirect to index.php
            header("Location: index.php");
            exit;
        } else {
            // Redirect back with error
            header("Location: login.php?error=Invalid password");
            exit;
        }
    } else {
        // Redirect back with error
        header("Location: login.php?error=No account found with this email");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <style>
        /* General Styles */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(to right, #4facfe, #00f2fe); /* Cool gradient */
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
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Gradient title */
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

        input[type="email"],
        input[type="password"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            border-color: #4facfe;
            box-shadow: 0 0 8px rgba(79, 172, 254, 0.6);
        }

        input[type="submit"] {
            padding: 12px;
            background: linear-gradient(to right, #6a11cb, #2575fc); /* Button gradient */
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

        .error-message {
            text-align: center;
            color: red;
            font-size: 14px;
            margin-top: 10px;
            background-color: #fbeaea;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(255, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <div class="form-wrapper">
            <?php if (!empty($_GET['error'])): ?>
                <div class="error-message"><?php echo htmlspecialchars($_GET['error']); ?></div>
            <?php endif; ?>
            <form action="login.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Enter Email" required>
                <input type="password" name="password" id="password" placeholder="Enter Password" required>
                <p><a href="reset_password.php">Forgot your password?</a></p>
                <input type="submit" value="Login">
            </form>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </div>
    </div>
</body>
</html>
