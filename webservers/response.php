<!DOCTYPE html>
<html>
    <head>
        <title>This is the response page, get over with it!!!</title>

    <?php
        $name = htmlspecialchars($_POST['username']);
        $email = htmlspecialchars($_POST['email']);
        $num = htmlspecialchars($_POST['age']);
    ?>
    
    </head>
   
    <body>
        <p>Your Username is: <?php echo ($name); ?></p>
        <p>Your email is: <?php echo ($email); ?></p>
        <p>Your age is:<?php echo ($num); ?></p>
        <p>mauhahaha</p>
    </body>
</html>