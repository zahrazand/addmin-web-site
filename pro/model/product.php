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

}

class product extends grouping
{
    public $name_pro ;
    public $id_pro ;
    public $number_pro ;
    public $price_pro ;

    function setNameProduct($name)
    {
        $this->$name_pro = $name;
    }

    function getNameProduct()
    {
        return $this->$name_pro;
    }

    function setIdProduct($id)
    {
        $this->$id_pro = $id;
    }

    function getIdProduct()
    {
        return $this->$id_pro;
    }

    
    function setNumberProduct($number)
    {
        $this->$number_pro = $number;
    }

    function getNumberProduct()
    {
        return $this->$number_pro;
    }

    
    function setPriceProduct($price)
    {
        $this->$price_pro = $price;
    }

    function getPriceProduct()
    {
        return $this->$price_pro;
    }

    function Exist_pro()
    {

    }
}


?>