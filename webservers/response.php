<!DOCTYPE html>
<html>
    <head>
        <title>This is the response page, get over with it!!!</title>

    <?php
        $name = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $num = filter_input(INPUT_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    ?>
    
    </head>
   
    <body>
        <p>Your Username is: <?php echo htmlspecialchars($name); ?></p>
        <p>Your email is: <?php echo htmlspecialchars($email); ?></p>
        <p>Your age is: <?php echo htmlspecialchars($num); ?></p>
        <p>mauhahaha</p>
    </body>
</html>