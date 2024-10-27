<!DOCTYPE html>
<html>
    <head>
        <script>
            function validateField() {
                var field1 = document.getElementById("username");
                var field2 = document.getElementById("password");
                var errorText = document.getElementById("errorText");
                if (field1.value.trim() === "" || field2.value.trim() === "") {
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

        $user = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $server = "localhost";
            $username = "your_db_user"; // Replace with your actual DB username
            $password = "your_db_password"; // Replace with your actual DB password
            $database = "your_db_name";
            $conn = mysqli_connect($server, $username, $password, $database);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
                echo "<p>Connection Failed</p>";
            }
        }

        ?>

        
    </head>

    <body>
    
    <h1>Welcome to Game Database </h1>   
    <h2>Login </h2>

        <form action="" method="POST">
            <label for="username">Username (alphanumeric only):</label><br>
            <input type="text" id="username" name="username" 
                    pattern="[A-Za-z0-9]+" onblur="validateField()" 
                    required placeholder="Enter your Username">
            <br>
            <br>

            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" 
                    required placeholder="Enter your Password"><br><br>

            <br>
            <br>

            <span id="errorText" class="error">Username and Password required</span><br><br>

            <input type="submit" value="Submit">

            <?php
            if (!empty($error)) {
                echo "<p class='error'>$error</p>";
            }
            if (!empty($success)) {
                echo "<p class='error'>$error</p>";
            }
            ?>

        </form>  
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