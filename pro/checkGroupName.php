<?php
require_once "config.php";
require_once "model/user.php";
require_once "model/product.php";

$
if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else{
    if(isset($_REQUEST['un'])) {
        $u = unserialize($_SESSION['USER']);
        $grouping=new grouping();
        $grouping->setIdGroup(getUsername());
        $grouping->setNameGroup($_REQUEST["un"]);
        if(!$grouping->IsGroupNameExict()){
            
            $Message=" group name isnt exict";
        }
        else{
            echo'<style type="text/css">
                .padd{
                    display: block;
                }
                </style>';
        }
}
?>