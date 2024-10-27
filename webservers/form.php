<!DOCTYPE html>
<html>
    <head>
        <script>
            function validateField() {
            var field1 = document.getElementById("username");
            var field2 = document.getElementById("password");
            var errorText = document.getElementById("errorText");
            if (field1.value.trim() === "") {
                errorText.style.display = "inline";
            } else {
                errorText.style.display = "none";
            }
            if (field2.value.trim() === "") {
                errorText.style.display = "inline";
            } else {
                errorText.style.display = "none";
            }
        }
        </script>

        <!-- text format for style -->
        <style> 
            body { font-family: Arial, sans-serif; }
            .error { color: red; display: none; }
        </style>

        <?php 
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $server = "localhost";
            $username = "your_db_username"; // Your DB username
            $password = "your_db_password"; // Your DB password
            $database = "your_db_name";
            $conn = mysqli_connect($server, $username, $password, $database);   

            if (!$conn) {
                die("Connection failed: {mysqli_connect_error()}");
              }
              echo "Connected successfully";
            
            $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING); // SANITIZER lol
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
                    // Redirect to another page or show content based on successful login
                    exit; // Prevent further code execution
                } else {
                    // Login failed
                    $error = "Invalid username or password.";
                }
            }
            mysqli_close($conn); // to tidy things up
        }
        ?>
        
    </head>

    <body>
    
    <h1>Welcome to Game Database </h1>   
    <h2>Login </h2>

        <form action="" method="POST">
            <label for="username">Username (alphanumeric only):</label><br>
            <input type="text" id="username" name="username" pattern="[A-Za-z0-9]+" onblur="validateField()"><br>
            <span id="errorText" class="error">Username required</span><br><br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required placeholder="Enter your password"><br><br>
            <span id="errorText" class="error">Password required</span><br><br>

            <input type="submit" value="Submit">
        </form>

            <?php
            if (!empty($error)) {
                echo "<p class='error'>$error</p>";
            }
            ?>
            <h4>
                <a href="index.html">
                    To landing page
                </a>
            </h4>

            <h4>
                <a href="welcome.html">
                    To Welcome Page
                </a>
            </h4>

    </body>
</html>