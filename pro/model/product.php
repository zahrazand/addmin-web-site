<?php

class grouping
{
    public $name_group ;
    public $id_group ;

    function setNameGroup($name)
    {
        $this->$name_group = $name;
    }

    function getNameGroup()
    {
        return $this->$name_group;
    }

    function setIdGroup($id)
    {
        $this->$id_group = $id;
    }

    function getIdGroup()
    {
        return $this->$id_group;
    }

    function Exist_group()
    {
        
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