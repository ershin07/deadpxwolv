<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>
    <?php  
        session_start();
        error_reporting(E_ALL);
    ini_set('display_errors', 1);
        //initializing connection
    
                $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
                $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
                $database = "Games"; // Change to your actual database name
                $server = "localhost";
                $conn = mysqli_connect($server, $username, $password, $database); // Connect to the database
           

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
                    echo "</tr>";
                }
            ?>  
        </table>
    </body>
</html>