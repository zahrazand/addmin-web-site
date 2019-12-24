<?php
session_start();
require "config.php" ;
require "model/user.php";
require "model/product.php";
include $ShareFolderPath."mainHeader.html";

$Message='';
$_groupname='';
if(isset($_POST['_add'])){
            
    $grouping=new grouping();
    $grouping->setIdGroup($u->getUsername());
    $grouping->setNameGroup($_POST['groupname']);
    $_groupname = $grouping->getNameGroup();
    if($_groupname!=""){
        $grouping->setNameGroup($_POST['groupname']);
        if(!$grouping->IsGroupNameExict()){
            $_SESSION['USER'] = serialize($u);
            $grouping->addGroup();
            $Message="add group name  ".$grouping->getNameGroup()." sucssecfuly";
        }
        else{
            $Message="group name exict ";
        }
    }
    else{
        $Message="please enter correct group name";
    }
}
   
include $viewpath."addGroup.html";
include $ShareFolderPath."mainFooter.html";
?>