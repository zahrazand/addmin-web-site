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
$_product='';
$_price=0;
$_num=0;
$_description='';
    
if(isset($_POST['_add'])){
            
    $_p=new product();
    $_p->setIdGroup($u->getUsername());
    $_groupname=$_SESSION['GNAME'];
    $_product=$_POST['_product'];
    $_price=(float)$_POST['_price'];
    $_num=(int)$_POST['_number'];
    $_description=$_POST['_description'];
    $_img=basename($_FILES["_img"]["name"]);
    if($_groupname!=NULL && $_product!=NULL && $_price!=NULL && $_num!=Null ){
        $_p->setNameGroup($_groupname);
        $_p->setNameProduct($_product);
        $_p->setPriceProduct($_price);
        $_p->setNumberProduct($_num);
        $_p->setDecsripProduct($_description);
        if($_img==""){
            $_p->setImgProduct("empty");
        }
        else{
            $res=uploadImg();
            if($res!="failed"){
                $_p->setImgProduct($res);
                if($_description==""){
                    $_p->setDecsripProduct("empty");
               }
                       
               if(!$_p->Exist_pro()){
                   $_SESSION['USER'] = serialize($u);
                   $_p->AddPro();
                   echo $_p->getIdGroup()." ".$_p->getNameGroup()." ".$_p->getDescripProduct()." ".$_p->getNameProduct() ;
                   $Message="add product sucssecfuly";
               }
               else{
                                    
                   $Message="product already exist ";
               }
            }
            else{
                $Message="Sorry, there was an error uploading your image.";
            }
        }
        
    }
    else{
        echo var_dump($_num)." ".var_dump($_price)." ".var_dump($_product)." ".$_groupname ." " .var_dump($_img);
        $Message="please enter correct value";
    }
}  
include $viewpath."addProduct.html";
include $ShareFolderPath."mainFooter.html";

function uploadImg(){
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["_img"]["name"]);  
    $file_type = $_FILES["_img"]["type"];
    $file_size = $_FILES["_img"]["size"];//Byte

    $FileCheck = true;

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $FileCheck = false;
    }

    // Check file size
    if ($file_size > 500000) { //500KB
        echo "Sorry, your file is too large.";
        $FileCheck = false;
    }

    // Allow certain file formats
    if($file_type != "image/jpeg") {
        echo "Sorry, only JPG files are allowed.";
        $FileCheck = false;
    }

    if($FileCheck)
    {
        if (move_uploaded_file($_FILES["_img"]["tmp_name"], $target_file)) {
            return  basename( $_FILES["_img"]["name"]);
        } else {
            return "failed";
        }
    } 
}
?>