<?php
session_start();
require "config.php" ;
require "model/user.php";
require "model/product.php"
$message='';

if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else
{
    $u = unserialize($_SESSION['USER']);
    $username=$u-> getUsername()
}
require "config.php";
include $ShareFolderPath."mainHeader.html";
include $ShareFolderPath."search.html";
include $ShareFolderPath."rightMenu.html";
include $ShareFolderPath."mainFooter.html";
?>