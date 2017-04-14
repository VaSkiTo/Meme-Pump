<?php
session_start();
$valid = false;
if(isset($_POST['username'])
        &&isset($_POST['password'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $_SESSION['user']=$user;
    if($user=="memepumpskiadmin"
            && $pass=="epicforever7"){
        if(session_status()==PHP_SESSION_NONE){
        session_start();
        }
        $_SESSION['loggedin']="1";
        $valid=true;
    }
    }

        if( $valid || (!empty($_SESSION['loggedin'])
                &&!empty($_SESSION['loggedin']))){
        echo "<!DOCTYPE html>
<html>
    <head>
        <title>Meme Pump</title>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
      <style>
      #para{

        width:300px;
        height:150px;

        }
      </style>
    </head>
    <body>
        <div id='today'>
        <h2>Post to today's pump</h2>
        <form id='formex' method='POST' enctype='multipart/form-data' action='uploadtoday.php'>
        <br>Title:<br>
        <input type='text' name='title'><br>Paragraph:<br>
        <textarea id='para' name='paragraph'></textarea><br>Image:<br>
        <input type='file' name='file'><br><br>
        <input type='submit' name='sub'>
        </form>
        </div>
        <div id='all'>
        <br><br>
        <h2>Update all pumps</h2>
        <form id='formex' method='POST' enctype='multipart/form-data' action='uploadall.php'>
        <br>Image:<br>
        <input type='file' name='file'><br><br>
        <input type='submit' name='sub'>
        </form>
        </div>
        <div>
        <br>
            <a href='logout.php'>Logout</a>
        </div>
    </body>
</html>";
    }else{
        header("location: adminlogin.php");
    }

?>
