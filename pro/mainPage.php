<?php
session_start();
#unset($_SESSION['USER']);
require "config.php";
include $ShareFolderPath."mainHeader.html";
include $ShareFolderPath."search.html";
include $ShareFolderPath."rightMenu.html";
include $ShareFolderPath."mainFooter.html";

?>