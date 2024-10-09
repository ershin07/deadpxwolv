<!DOCTYPE html>
<html>
    <head>
        <title>This is the response page, get over with it!!!</title>

    <?php
        $name = filter_input($_POST['username']);
        $email = htmlspecialchars(_$POST['email']);
        $num = htmlspecialchars($_POST['age']);
    ?>
    </head>

    <body>
        <p>Your Username is: <?php echo htmlspecialchars($name); ?></p>
        <p>Your email is: <?php echo htmlspecialchars($email); ?></p>
        <p>Your age is:<?php echo htmlspecialchars($num); ?></p>
        <p>mauhahaha</p>
    </body>
</html>
