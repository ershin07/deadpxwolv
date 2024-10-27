<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>

    <?php
        $server = "localhost";
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $database = "Games";
        $conn = mysqli_connect($server, $username, $password, $database);
    ?>
    
    </head>
   
    <body>
       <?php 
        // to be updated

       ?>
    </body>
</html>