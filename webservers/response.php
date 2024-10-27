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
       session_start();

        //initializing connection
            $server = "localhost";
            $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
            $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
            $database = "Games";
            $conn = mysqli_connect($server, $username, $password, $database);

        // Initialize SQL query
            $sql = "SELECT * FROM Games";

        // Initialize variables to hold input values
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $developer = filter_input(INPUT_POST, 'developer', FILTER_SANITIZE_STRING);
            $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);

        if (!$conn) {
            // Connection failed, output error message
            $errorMessage = "Connection failed: " . mysqli_connect_error(); // Get the error message
            echo "<script>showError($errorMessage);</script>"; // Pass error message to JavaScript
        } else {
            // Connection successful, show success and redirect
            echo "<script>showSuccess();</script>";
        }
        // Store the connection details in session
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password; 



        // Build SQL query based on input values
            $conditions = [];
            if (!empty($title)) {
                $conditions[] = "title='$title'";
            }
            if (!empty($developer)) {
                $conditions[] = "developer='$developer'";
            }
            if (!empty($year)) {
                $conditions[] = "year='$year'";
            }

            if (!empty($conditions)) {
                $sql .= " WHERE " . implode(" AND ", $conditions);
            }


        // Execute the query and check for results
            $result = mysqli_query($conn, $sql); 
            if (!$result) {
                echo "Error executing query: " . mysqli_error($conn);
                exit(); // Stop if there is an error with the query
            }

    ?>

    <style>
    table, th, td {
    border:1px solid black;
    }
    </style>

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
            <input type="number" id="year" name="year" >
            <br>
            <br>
            <input type="submit" value="Submit">
        </form>
        
        <br>
        <br>
        
        <table style="width:50%">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Developer</th>
            </tr>
            <?php
      
                foreach($result as $row) {
                    echo "<tr>";
                    echo "<td>{$row['id']}</td>"; // ID column
                    echo "<td>{$row['title']}</td>"; // Title column
                    echo "<td>{$row['developer']}</td>"; // Developer column
                    echo "</tr>";
                }
            ?>  
        </table>
    </body>
</html>