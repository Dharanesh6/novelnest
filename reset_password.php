<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
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

        input[type="email"] {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
            transition: box-shadow 0.3s ease, border-color 0.3s ease;
        }

        input[type="email"]:focus {
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

        .success-message {
            text-align: center;
            color: green;
            font-size: 14px;
            margin-top: 10px;
            background-color: #eafbe7;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 4px 12px rgba(0, 255, 0, 0.1);
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
        <h2>Reset Password</h2>
        <div class="form-wrapper">
            <form action="reset_password.php" method="POST">
                <input type="email" name="email" id="email" placeholder="Enter Your Email" required>
                <input type="submit" value="Reset Password">
            </form>
            <p>Remembered your password? <a href="login.php">Login</a></p>
        </div>
    </div>
</body>
</html>
