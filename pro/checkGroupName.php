<?php
session_start();
require_once "config.php";
require_once "model/user.php";
require_once "model/product.php";

if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else{
    $_groupname='';
    if(isset($_REQUEST['un'])) {
        $u = unserialize($_SESSION['USER']);
        $grouping=new grouping();
        $grouping->setIdGroup($u->getUsername());
        $grouping->setNameGroup($_REQUEST["un"]);
        $_groupname=$_REQUEST["un"];
        if(!$grouping->IsGroupNameExict()){
            
            echo " group name isnt exict";
        }
        else{
            $_SESSION['GNAME'] = $grouping->getNameGroup();
            echo'<style type="text/css">
                .padd{
                    display: block;
                }
                </style>';
        }
    }
}
?>