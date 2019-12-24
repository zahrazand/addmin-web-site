<?php
session_start();

require "model/user.php";
require "model/product.php";

if(!isset($_SESSION['USER'])) {
    header('Location: index.php');
}
else
{
    $u = unserialize($_SESSION['USER']);
    $g=new grouping();
    $g->setIdGroup($u-> getUsername());
    $groupsList = $g->ShowGroups();
    echo json_encode($groupsList);
}


?>