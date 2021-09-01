<?php
namespace Controller;

use Model\DBConnection;
use Model\Country;
use Model\CountryDB;

class CountryController
{
    public $countryDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=citydb", "root", "");
        $this->countryDB = new CountryDB($connection->connect());
        
    }
    public function add()
    {
        // $countries = $this->countryDB->getAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            include './view/country/add.php';
        }else{
            $countryName  = $_POST['countryName'];
            $countryFlag = $_FILES['countryFlag']['name'];
            if($_FILES['countryFlag']['error'] == 4){
               $countryFlag = $_POST['countryFlag'];
            }
            $typeFile = $_FILES['countryFlag']['type'];
            $extension = pathinfo($_FILES['countryFlag']['name'], PATHINFO_EXTENSION);
            $path = "images/{$countryName}.{$extension}";
            $country = new Country($countryName, $countryFlag);
            if(substr($typeFile, 0, 5) == 'image'){
                move_uploaded_file($_FILES['countryFlag']['tmp_name'], $path);
                $this->countryDB->create($country);
                header('location: index.php?view=country');
            }else{
                
            }
        }
    }
    public function home()
    {
        $countries = $this->countryDB->getAll();
        include './view/country/home.php';

    }
    public function detail()
    {
        $this->edit();
    }
    public function edit()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $countries = $this->countryDB->getAll();
            $id = $_GET['id'];
            $country = $this->countryDB->getID($id);
            $country->countryID = $id;
            include './view/country/edit.php';
        }else{
            
            $id = $_POST['countryID'];
            $countryName  = $_POST['countryName'];
            $countryFlag = $_FILES['countryFlag']['name'];
            if($_FILES['countryFlag']['error'] == 4){
               $countryFlag = $_POST['countryFlag'];
            }
            $path = "images/{$countryFlag}";
            move_uploaded_file($_FILES['countryFlag']['tmp_name'], $path);
            $country = new Country($countryName, $countryFlag);
            echo $country->countryID = $id;
            $this->countryDB->update($id, $country);
            header('location: index.php?view=country');
        }
    }
    
    public function remove()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $country = $this->countryDB->getID($id);
            include './view/country/delete.php';
        }
        else{
            echo $id = $_POST['countryID'];
            $this->countryDB->delete($id);
            header('location: index.php?view=country');
        }
    }
    public function notFound()
    {
        include './view/notFound.php';
    }
}