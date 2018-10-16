<!DOCTYPE html>
<?php
// in order to force the usage of secure protocol HTTPS (repeat in every .php file)
if(empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == "off"){
$redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
header('HTTP/1.1 301 Moved Permanently');
header('Location: ' . $redirect);
exit();
}  ?>
<html>
    <head>
        <title>Meme Pump</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style type="text/css">
            #adminform{
                width:200px;
                margin:0 auto;
            }
        </style>
    </head>
    <body>
        <div id="adminform">
            <br><br><br><br><br>
            <form id="loginform" action="admin.php" method="POST">
                Admin Login<br>
                Enter Username:<br>
                <input type="text" name="username">
                <br>
                Enter Password:<br>
                <input type="password" name="password">
                <br><br>
                <input type="submit" name="submit">
            </form>
        </div>
    </body>
</html>
