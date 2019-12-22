<?php
session_start();
require "config.php";
require "model/user.php";
if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else
{
    $u = unserialize($_SESSION['USER']);
    $WelcomeMessage = 'Welcome '.$u->getName(). ' '.$u->getFamily();
}
include $ShareFolderPath."mainHeader.html";
include $ShareFolderPath."search.html";
include $ShareFolderPath."rightMenu.html";
include $ShareFolderPath."mainFooter.html";

?>