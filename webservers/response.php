<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>

    <script>
        function errorMSG(){
            alert('Connection Failed: $errorMessage');
            setTimeout(function() {
            window.location.href = 'form.html'; // Change to your actual login page
            }, 3000);
        }

        function success(){
            ();
        }

    </script>

    <?php
        $server = "localhost";
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        $database = "Games";
        $conn = mysqli_connect($server, $username, $password, $database);

        if (!$conn) {
            errorMSG()

        } else {
            // Show success popup
            echo "Connected successfully";
        }

    ?>
    
    </head>

</html>