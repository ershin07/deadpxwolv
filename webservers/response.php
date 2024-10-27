<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>

    <script>

        function startTimer() {
            setTimeout(function() {
                window.location.href = "form.html";

            }, 5000); // Redirects after 5 seconds
        }

        setTimeout(() => {
            
        }, timeout);
        

    </script>

    <?php
        $server = "localhost";
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $database = "Games";
        $conn = mysqli_connect($server, $username, $password, $database);

        if (!$conn) {
            echo "startTimer()";
            echo "Invalid Username or Password";
        } else {
            // Show success popup
            echo "Connected successfully";
        }

    ?>

    </head>

</html>