<!DOCTYPE html>
<html>
    <head>
        <title>This is the response page, get over with it!!!</title>

    <?php
        $name = htmlspecialchars($_GET['name']);
        $email = htmlspecialchars($_GET['email']);
        $age = htmlspecialchars($_GET['number']);
    ?>


    </head>
    <body>
        <p>Your Username is: <?= echo $username; ?></p>
        <p>Your email is: <?= echo $email;?></p>
        <p>Your age is:<?= echo $age;?></p>
        <p>mauhahaha</p>
    </body>
</html>
