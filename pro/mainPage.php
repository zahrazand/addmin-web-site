<?php
session_start();

if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else
{
    $u = unserialize($_SESSION['USER']);
    $WelcomeMessage = 'Welcome '.$u->getName(). ' '.$u->getFamily();
}
require "config.php";
include $ShareFolderPath."mainHeader.html";
include $ShareFolderPath."search.html";
include $ShareFolderPath."rightMenu.html";
include $ShareFolderPath."mainFooter.html";

?>