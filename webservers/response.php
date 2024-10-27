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
            window.location.href = "welcome.html";
        }
    </script>

    <?php
        $server = "localhost";
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $database = "Games";
        $conn = mysqli_connect($server, $username, $password, $database);

        if (!$conn) {
             echo "<script>showError();</script>";
        } else {
            // Show success popup
            echo "<script>showSuccess();</script>";
            mysqli_close($conn); 
        }

    ?>

    </head>

</html>