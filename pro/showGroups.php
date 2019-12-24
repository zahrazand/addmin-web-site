<?php
session_start();
require "config.php" ;
require "model/user.php";
include $ShareFolderPath."mainHeader.html";
include $ShareFolderPath."rightMenu.html";

if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}

include $ViewPath."showGroups.html";
include $ShareFolderPath."mainFooter.html";
?>