<!DOCTYPE html>
<html>
    <head>
        <title>Result</title>
        <?php
        $name = filter_input($_POST, 'username');
        $email = filter_input($_POST, 'email', FILTER_SANITIZE_EMAIL);
        $num = filter_input($_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
        $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $num = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
         ?>

    </head>

        <p>Your age is: <?php echo htmlspecialchars($num); ?></p>
        <p>mauhahaha</p>
    </body>
</html>