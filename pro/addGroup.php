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
    $grouping=new grouping();
    $grouping->setIdGroup(getUsername());
    $grouping->setNameGroup($_POST['_add']);
    if($grouping->checkGroupName()){
        $_SESSION['USER'] = serialize($u);
        $_SESSION['grouping'] = serialize($grouping);
        $message="add group name sucssecfuly";
    }
    else{
        $message="group name exict ";
    }
}
require "config.php";
include $ShareFolderPath."mainHeader.html";
include $ShareFolderPath."search.html";
include $ShareFolderPath."rightMenu.html";
include $ShareFolderPath."mainFooter.html";
?>