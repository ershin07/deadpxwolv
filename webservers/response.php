<!DOCTYPE html>
<html>
    <head>
        <title>This is the response page, get over with it!!!</title>

    <?php
        $name = filter_input($_POST, 'username');
        $email = filter_input($_POST, 'email', FILTER_SANITIZE_EMAIL);
        $num = filter_input($_POST, 'age', FILTER_SANITIZE_NUMBER_INT);
    ?>
    
    </head>
   
    <body>
        <p>Your Username is: <?php echo htmlspecialchars($name); ?></p>
        <p>Your email is: <?php echo htmlspecialchars($email); ?></p>
        <p>Your age is: <?php echo htmlspecialchars($num); ?></p>
        <p>mauhahaha</p>
    </body>
</html>