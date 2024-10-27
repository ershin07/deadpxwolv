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
        //initializing variable
        $title = '';
        $developer = '';
        $year = '';

        //initializing connection
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

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            if (empty($title) && empty($developer) && empty($year)){
                $sql = "select * from Games;"; 
            } elseif (empty($developer) && empty($year)){
                $sql = "select * from Games WHERE title='$title';"; 
            } elseif (empty($title) && empty($year)){
                $sql = "select * from Games WHERE developer='$developer';"; 
            } elseif (empty($title) && empty($developer)){
                $sql = "select * from Games WHERE year='$year';"; 
            }    
        }

        $result = mysqli_query($conn, $sql); 

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