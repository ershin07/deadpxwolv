<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>

    <script>

        function startTimer() {
            setTimeout(function() {
                window.location.href = "form.html"
            }, 5000); // Redirects after 5 seconds
        }

        function showError() {
            alert("Invalid Username or Password"); // Alert for invalid credentials
            startTimer(); // Start the timer for redirection
        }

        function showSuccess() {
            alert("Connected successfully!"); // Show success message
            startTimer(); // Start the timer for redirection
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