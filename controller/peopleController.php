<?php
namespace Controller;

use Model\DBConnection;
use Model\people;
use Model\peopleDB;
use Model\City;
use Model\CityDB;
use Model\Country;
use Model\CountryDB;

class peopleController
{
    public $peopleDB;
    public $cityDB;
    public $ountryDB;

    public function __construct()
    {
        $connection = new DBConnection("mysql:host=localhost;dbname=citydb", "root", "");
        $this->peopleDB = new PeopleDB($connection->connect());
        $this->cityDB = new CityDB($connection->connect());
        $this->countryDB = new CountryDB($connection->connect());
        
    }
    public function add()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $results = $this->cityDB->getAll();
            $cities = [];
            foreach($results as $value){
                $cities[] = $value[0];
            }
            include './view/people/add.php';
        }else{
            $name = $_POST['name'];
            $age = $_POST['age'];
            $gender = $_POST['gender'];
            $cityID = $_POST['cityID'];
            if($_FILES['image']['error'] == 4){
                $image = $_POST['image'];
             }
             $path = "images/{$image}";
             move_uploaded_file($_FILES['image']['tmp_name'], $path);
             $people = new People($name, $age, $gender, $image, $cityID);
             $this->peopleDB->create($people);
            //  header('location: index.php?view=people');
        }
    }
    public function home()
    {
        $results = $this->peopleDB->getAll();
        include './view/people/home.php';
    }
    public function detail()
    {
        $this->edit();
    }
    public function edit()
    {
        $allCity = $this->cityDB->getAll();
        $cities = [];
        foreach($allCity as $value){
            $cities[] = $value[0];
        }
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $results = $this->peopleDB->getID($id);
            $people = $results[0];
            include './view/people/edit.php';
        }else{
            $id = $_POST['peopleID'];
            $name  = $_POST['name'];
            $age  = $_POST['age'];
            $gender  = $_POST['gender'];
            $image = $_FILES['image']['name'];
            if(($_FILES['image'])['error'] == 4){
               $image = $_POST['image'];
            }
            ;
            $extension = pathinfo($image, PATHINFO_EXTENSION);
            $cityID  = $_POST['cityID'];
            $path = "images/{$name}.{$extension}";
            move_uploaded_file($_FILES['image']['tmp_name'], $path);
            $people = new People($name, $age, $gender, $image, $cityID);
            $people->peopleID = $id;
            $this->peopleDB->update($id, $people);
            $message = '<div class="message alert alert-danger row">Lưu thành công</div>';
            include './view/people/edit.php';
        }
    }
    
    public function remove()
    {
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $id = $_GET['id'];
            $results = $this->peopleDB->getID($id);
            $people = $results[0];
            include './view/people/delete.php';
        }
        else{
            $id = $_POST['id'];
            $this->peopleDB->delete($id);
            header('location: index.php?view=people');
        }
    }
    public function notFound()
    {
        include './view/notFound.php';
    }
}