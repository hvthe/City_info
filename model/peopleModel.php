<?php
namespace Model;

class People
{
    public $peopleID;
    public $name;
    public $age;
    public $gender;
    public $image;
    public $cityID;
    
    public function __construct($name, $age, $gender, $image, $cityID)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
        $this->image = $image;
        $this->cityID = $cityID;
    }

    
}

?>