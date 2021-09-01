<?php
namespace Controller;

use Model\DBConnection;
use Model\City;
use Model\Country;
use Model\CountryDB;
use Model\CityDB;

class CityController
{
    public $cityDB;
    public $countryDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=citydb", "root", "");
        $this->cityDB = new CityDB($connection->connect());
        $this->countryDB = new CountryDB($connection->connect());
        
    }
    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $countries = $this->countryDB->getAll();

            include './view/city/add.php';
        }else{
            $cityName = $_POST['cityName'];
            $cityArea = $_POST['cityArea'];
            $cityPopulation = $_POST['cityPopulation'];
            $cityGdp = $_POST['cityGdp'];
            $cityIntro = $_POST['cityIntro'];
            $countryID = $_POST['countryID'];
            $city = new City($cityName, $cityArea, $cityPopulation, $cityGdp, $cityIntro, $countryID);
            $this->cityDB->create($city);
            header('location: index.php');
        }
    }
    public function home()
    {
        $results = $this->cityDB->getAll();
        include './view/city/home.php';

    }
    public function detail()
    {
        $id = $_GET['id'];
        $rowCount = $this->cityDB->rowCount($id);
        if($rowCount){
            $results = $this->cityDB->getID($id);
            $city = $results[0];
            $country = $results[1];
            include './view/city/detail.php';
        }else{
            $this->notFound();
        }
    }
    public function edit()
    {
        $countries = $this->countryDB->getAll();
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $rowCount = $this->cityDB->rowCount($id);
            if($rowCount){
                $results = $this->cityDB->getID($id);
                $city = $results[0];
                include './view/city/edit.php';
            }else{$this->notFound();}
            
        }else{
            $id = $_POST['cityID'];
            $rowCount = $this->cityDB->rowCount($id);
            $cityName = $_POST['cityName'];
            $cityArea = $_POST['cityArea'];
            $cityPopulation = $_POST['cityPopulation'];
            $cityGdp = $_POST['cityGdp'];
            $cityIntro = $_POST['cityIntro'];
            $countryID = $_POST['countryID'];
            $city = new City($cityName, $cityArea, $cityPopulation, $cityGdp, $cityIntro, $countryID);
            $city->cityID = $id;
            $message = '';
            $message .= $cityGdp<0?  '<p>GDP phải lớn hơn 0<p>':'';
            $message .= $cityPopulation<0?  '<p>Dân số phải lớn hơn 0<p>':'';
            $message .= $cityArea<0?  '<p>Diện tích phải lớn hơn 0<p>':'';
            if(!$cityGdp<0 || !$cityPopulation<0 || !$cityArea<0){
                $this->cityDB->update($id, $city);
                $message = '<p>Lưu thành công<p>';
            }
            include './view/city/edit.php';
        }
    }
    public function remove()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $rowCount = $this->cityDB->rowCount($id);
            $results = $this->cityDB->getID($id);
            if($rowCount){
                $city = $results[0];
                include './view/city/delete.php';
            }else{$this->notFound();}
        }
        else{
            $id = $_POST['id'];
            $this->cityDB->delete($id);
            header('location: index.php');
        }
    }

    public function search()
    {
        if(isset($_POST['keyWord'])){
            $word = trim($_POST['keyWord']);
        }else{
            $word = '';
        }
        $message = "$word";
        $word = explode(' ',$word);
        $keyWord = '%';
        foreach($word as $value){
            $keyWord .= "$value%";
        }
        $results = $this->cityDB->search($keyWord);
        $numRows = count($results);
        include './view/search.php';
    }
    
    public function notFound()
    {
        include './view/notFound.php';
    }
}