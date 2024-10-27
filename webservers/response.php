<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>
    <?php  
        session_start();
        //initializing connection
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
            // Capture username and password from form submission
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                $database = "Games"; // Change to your actual database name
                $server = "localhost";
        
            // Check if username and password are provided
                if (empty($username) || empty($password)) {
                    die("Username or password cannot be empty");
                }
        
            // Store credentials in session variables
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
        
            // Connect to the database
                $conn = mysqli_connect($server, $username, $password, $database);
        
            // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    echo "Connected successfully as user: " . htmlspecialchars($username) . "<br>";
                }
            } else {
            // Use stored session variables to connect again if they exist
                if (isset($_SESSION['username']) && isset($_SESSION['password'])) {
                    $username = $_SESSION['username'];
                    $password = $_SESSION['password'];
                    $database = "Games"; // Your database name
                    $server = "localhost";
            
            // Connect to the database using session variables
                $conn = mysqli_connect($server, $username, $password, $database);}

                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
            } 

        // Initialize SQL query
            $sql = "SELECT * FROM Games";

        // Initialize variables to hold input values
            $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
            $developer = filter_input(INPUT_POST, 'developer', FILTER_SANITIZE_STRING);
            $year = filter_input(INPUT_POST, 'year', FILTER_SANITIZE_NUMBER_INT);

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
        
        // If exit button is clicked
            if (isset($_POST['exit'])) {
                mysqli_close($conn); // Close the connection
                header("Location: form.html"); // Redirect to the login page
                exit();
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
            <input type="submit" name="exit" value="Exit"> <!-- Exit button -->
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
                    echo "<td>{$row['year']}</td>"; // year column
                    echo "</tr>";
                }
            ?>  
        </table>
    </body>
</html>