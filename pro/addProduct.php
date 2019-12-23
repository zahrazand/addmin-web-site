<?php
session_start();
require "config.php" ;
require "model/user.php";
require "model/product.php";
include $ShareFolderPath."mainHeader.html";
include $ShareFolderPath."rightMenu.html";
$WelcomeMessage='';
if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else
{
    $u = unserialize($_SESSION['USER']);
    $WelcomeMessage = 'Welcome '.$u->getName(). ' '.$u->getFamily();
}
include $ShareFolderPath."search.html";
$Message='';
$_groupname='';
if(isset($_POST['_add'])){
            
    $grouping=new grouping();
    $grouping->setIdGroup($u->getUsername());
    $_groupname=$_POST['_groupname'];
    if($_groupname!=""){
        $grouping->setNameGroup($_POST['_groupname']);
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
   
include $viewpath."addProduct.html";
include $ShareFolderPath."mainFooter.html";
?>