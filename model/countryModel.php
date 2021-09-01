<?php
namespace Model;

class Country
{
    public $countryID;
    public $countryName;
    public $countryFlag;

    public function __construct($countryName, $countryFlag)
    {
        $this -> countryName = $countryName;
        $this -> countryFlag = $countryFlag;
    }

}