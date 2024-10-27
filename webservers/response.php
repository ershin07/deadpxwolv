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
            // Show error popup and redirect to login after 3 seconds
            $errorMessage = mysqli_connect_error(); // Get the connection error
            echo "<script>
                    alert('Connection Failed: $errorMessage');
                    setTimeout(function() {
                        window.location.href = 'form.html'; // Change to your actual login page
                    }, 3000);
                  </script>";
        } else {
            // Show success popup
            echo "<script>alert('Connected successfully');</script>";
        }

    ?>
    </head>

</html>