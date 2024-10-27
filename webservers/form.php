<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .error { color: red; }
    </style>
</head>
<body>
    <h2>Login</h2>
    <?php
    $error = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $server = "localhost";
        $username = "your_db_username"; // Your DB username
        $password = "your_db_password"; // Your DB password
        $database = "your_db_name";

        $conn = mysqli_connect($server, $username, $password, $database);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if (empty($user) || empty($pass)) {
            $error = "Username and password are required.";
        } else {
            $query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
            $result = mysqli_query($conn, $query);

            if (!$result) {
                $error = "Query failed: " . mysqli_error($conn);
            } elseif (mysqli_num_rows($result) > 0) {
                // Successful login
                echo "Login successful.";
                exit; // Prevent further code execution
            } else {
                // Login failed
                $error = "Invalid username or password.";
            }
        }

        mysqli_close($conn);
    }
    ?>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($_POST['username'] ?? '', ENT_QUOTES); ?>"><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>

        <input type="submit" value="Submit">
    </form>
    <?php
    if (!empty($error)) {
        echo "<p class='error'>$error</p>";
    }
    ?>
</body>
</html>
