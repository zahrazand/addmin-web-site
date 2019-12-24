<?php

class grouping
{
    protected $name_group ;
    protected $id_group ;

    function setNameGroup($name)
    {
        $this->name_group = $name;
    }

    function getNameGroup()
    {
        return $this->name_group;
    }

    function setIdGroup($id)
    {
        $this->id_group = $id;
    }

    function getIdGroup()
    {
        return $this->id_group;
    }

    Public function IsGroupNameExict()
    {
        $paramTypes = "ss";
        $Parameters = array($this->id_group , $this->name_group);
        $result = database::ExecuteQuery('CheckGroupName', $paramTypes, $Parameters);
        if(mysqli_num_rows($result)>0)
        {
            return true;
        }
        return false;
        
    }
    function addGroup(){
        $paramTypes = "ss";
        $Parameters = array($this->id_group , $this->name_group);
        $result = database::ExecuteQuery('AddGroup', $paramTypes, $Parameters);
        return TRUE;
    }
    public function jsonSerialize(){
        return get_object_vars($this);
    }
    public function ShowGroups(){
        $paramTypes = "s";
        $Parameters = array($this->id_group );
        $result = database::ExecuteQuery('ShowGroups', $paramTypes, $Parameters);
        $groupsList=array();
        $i = 0;
        while ($row = $result->fetch_array())
        {
            $tempGroup=new grouping();
            $tempGroup->setIdGroup($row["gId"]);
            $tempGroup->setNameGroup($row["groupName"]);
            $groupsList[$i++]=$tempGroup->jsonSerialize();
        }
        return $groupsList;
    }
   
}

class product extends grouping
{
    private $name_pro ;
    private $descrip_pro;
    private $number_pro ;
    private $price_pro ;
    private $img_pro;

    function setNameProduct($name)
    {
        $this->name_pro = $name;
    }

    function getNameProduct()
    {
        return $this->name_pro;
    }

    function setDecsripProduct($desc)
    {
        $this->descrip_pro = $desc;
    }

    function getDescripProduct()
    {
        return $this->descrip_pro;
    }

    
    function setNumberProduct($number)
    {
        $this->number_pro = $number;
    }

    function getNumberProduct()
    {
        return $this->number_pro;
    }
    
    function setPriceProduct($price)
    {
        $this->price_pro = $price;
    }

    function getPriceProduct()
    {
        return $this->price_pro;
    }
    function setImgProduct($img)
    {
        $this->img_pro = $img;
    }

    function getImgProduct()
    {
        return $this->img_pro;
    }

    function Exist_pro()
    {
        $paramTypes = "sss";
        $Parameters = array($this->id_group , $this->name_group , $this->name_pro);
        $result = database::ExecuteQuery('CheckProduct', $paramTypes, $Parameters);
        if(mysqli_num_rows($result)>0)
        {
            return true;
        }
       return false;
    }
    function AddPro(){
        $paramTypes = "siissss";
        $Parameters = array($this->name_pro, $this->price_pro, $this->number_pro , $this->descrip_pro,$this->name_group, $this->id_group, $this->img_pro);
        $result = database::ExecuteQuery('AddProduct', $paramTypes, $Parameters);
        return TRUE;

    }
}


?>