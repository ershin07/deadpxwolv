<!DOCTYPE html>
<html>
    <head>
        <title>This is the response page, get over with it!!!</title>

    <?php
        $name = filter_input($INPUT_POST['username'], );
        $email = htmlspecialchars($INPUT_POST['email']);
        $num = htmlspecialchars($INPUT_POST['age']);
    ?>
    </head>

    <body>
        <p>Your Username is: <?php echo $name; ?></p>
        <p>Your email is: <?php echo $email; ?></p>
        <p>Your age is:<?php echo $num; ?></p>
        <p>mauhahaha</p>
    </body>
</html>
