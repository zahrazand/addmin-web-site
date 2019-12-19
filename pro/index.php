<?php
session_start();
require "config.php" ;
require "model/users.php";
#include $ShareFolderPath."header.html";

$message='';

if (isset($_POST['_Login'])) 
{
    $adm = new user();
    $adm->set_username($_POST['_Username']);
    $adm->set_password($_POST['_Password']);

    if(checkUserPass())
    {
        $_SESSION['USER'] = serialize($u);
        header('Location: mainPage.php');
    }

    $message = 'invalid username or password';

}

include $viewpath."login.html";
#include $ShareFolderPath."footer.html";


?>