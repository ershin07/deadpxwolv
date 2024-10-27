<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>
    <script>

            function showError() {
            alert("Invalid Username or Password"); // Alert for invalid credentials
            window.location.href = "form.html";
        }

        function showSuccess() {
            alert("Connected successfully!"); // Show success message
        }
    </script>

    <?php
        $server = "localhost";
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $database = "Games";
        $conn = mysqli_connect($server, $username, $password, $database);

       
        if (!$conn) {
            // Connection failed, output error message
            $errorMessage = "Connection failed: " . mysqli_connect_error(); // Get the error message
            echo "<script>showError($errorMessage);</script>"; // Pass error message to JavaScript
        } else {
            // Connection successful, show success and redirect
            echo "<script>showSuccess();</script>";
        }

        $sql = "select * from Games;"; 
        $result = mysqli_query($conn, $sql);

        
    ?>
    <h1>
        Enter data base
    </h1>
    </head>
    <body>
        <form action="" method="POST">
            <label for="title">Title:</label><br>
            <input type="text" id="title" name="title" >
            <br>
            <br>

            <label for="developer">Developer:</label><br>
            <input type="text" id="developer" name="developer" >
            <br>
            <br>

            <label for="year">Year:</label><br>
            <input type="int" id="year" name="year" >
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>
        
        <?php

            foreach($result as $row) {
                echo "<tr>";
                echo "<td>{$row['id']}</td>"; // ID column
                echo "<td>{$row['title']}</td>"; // Title column
                echo "<td>{$row['developer']}</td>"; // Developer column
                echo "</tr>"
             };
        ?>  

    </body>
</html>