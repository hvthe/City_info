<?php
namespace Model;

class City
{
    public $cityID;
    public $cityName;
    public $cityArea;
    public $cityPopulation;
    public $cityGdp;
    public $cityIntro;
    public $countryID;
    
    public function __construct($cityName, $cityArea = null, $cityPopulation  = null,
    $cityGdp  = null, $cityIntro  = null, $countryID  = null)
    {
        $this->cityName = $cityName;
        $this->cityArea = $cityArea;
        $this->cityPopulation = $cityPopulation;
        $this->cityGdp = $cityGdp;
        $this->cityIntro = $cityIntro;
        $this->countryID = $countryID;
    }

    
}

?>