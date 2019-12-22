<?php
session_start();
unset($_SESSION['USER']);
require "config.php" ;
require "model/user.php";
include $ShareFolderPath."loginHeader.html";

$message='';
$_Username='';
if (isset($_POST['_Login'])) 
{
    $adm = new user();
    $_Username=$adm->setUsername($_POST['_Username']);
    $adm->setPassword($_POST['_Password']);
    if($adm->checkUserPass())
    {
        $_SESSION['USER'] = serialize($adm);
        header('Location: mainPage.php');
    }

    $message = 'invalid username or password';

}
include $viewpath."login.html";
include $ShareFolderPath."loginFooter.html";


?>