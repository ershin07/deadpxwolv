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

        if (!$conn) {
            die("Connection failed: {mysqli_connect_error()}";
            echo "<p>Connection Failed</p>";);
          }
          echo "<p>Connected successfully</p>";

    ?>
    </head>

</html>