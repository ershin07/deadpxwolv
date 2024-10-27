<!DOCTYPE html>
<html>
<head>
    <title>Game Database Login</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .error { color: red; display: none; }
    </style>
    <script>
        function validateField() {
            var field1 = document.getElementById("username");
            var field2 = document.getElementById("password");
            var errorText = document.getElementById("errorText");

            if (field1.value.trim() === "" || field2.value.trim() === "") {
                errorText.style.display = "inline";
                return false; // Prevent form submission
            } else {
                errorText.style.display = "none";
                return true;
            }
        }
    </script>
</head>
<body>

<?php 
// Server-side PHP code to process login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "your_db_user"; // Replace with your actual DB username
    $password = "your_db_password"; // Replace with your actual DB password
    $database = "your_db_name";

    // Establish database connection
    $conn = new mysqli($server, $username, $password, $database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize input
    $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    if (empty($user) || empty($pass)) {
        $error = "Username and password are required.";
    } else {
        // Prepare and bind statement to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $user, $pass); // Bind parameters
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows > 0) {
            echo "<p>Login successful.</p>";
            exit;
        } else {
            $error = "Invalid username or password.";
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<h1>Welcome to Game Database</h1>   
<h2>Login</h2>

<form action="" method="POST" onsubmit="return validateField()">
    <label for="username">Username (alphanumeric only):</label><br>
    <input type="text" id="username" name="username" pattern="[A-Za-z0-9]+" required placeholder="Enter your Username">
    <br><br>

    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required placeholder="Enter your Password"><br><br>

    <span id="errorText" class="error">Username and Password required</span><br><br>
    <input type="submit" value="Submit">
</form>  

<?php
// Display error message if there was an error
if (isset($error)) {
    echo "<p class='error'>$error</p>";
}
?>

<h4><a href="index.html">To landing page</a></h4>
<h4><a href="welcome.html">To Welcome Page</a></h4>

</body>
</html>
