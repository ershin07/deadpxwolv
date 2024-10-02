<!DOCTYPE html>
<html>
    <head>
        <title>This is the response page, get over with it!!!</title>

    <?php
        $name = htmlspecialchars($_GET['username']);
        $email = htmlspecialchars($_GET['email']);
        $age = htmlspecialchars($_GET['age']);
    ?>
    </head>

    <body>
        <p>Your Username is: <?php echo $username; ?></p>
        <p>Your email is: <?php echo $email; ?></p>
        <p>Your age is:<?php echo $age; ?></p>
        <p>mauhahaha</p>
    </body>
</html>
