<?php 
namespace Model;

class PeopleDB
{
    public $connection;

    public function __construct($connection)
    {
        $this -> connection = $connection;
    }
    public function create($people)
    {
        $sql = "INSERT INTO people(`name`, `age`, `gender`, `image`, `cityID`)
        VALUE (?, ?, ?, ?, ?)";
        $statements = $this->connection->prepare($sql);
        $statements->bindParam(1, $people->name); 
        $statements->bindParam(2, $people->age); 
        $statements->bindParam(3, $people->gender); 
        $statements->bindParam(4, $people->image);
        $statements->bindParam(5, $people->cityID);
        return $statements->execute();
    }
    public function getAll(){
            $sql = "SELECT people.*, city.cityID, city.cityName FROM people INNER JOIN city 
            ON people.cityID = city.cityID";
        $statements = $this->connection->prepare($sql);
        $statements->execute();
        $rows = $statements->fetchAll();
        $results = [];
        foreach($rows as $key => $row){
            $people = new People($row['name'], $row['age'], $row['gender'], $row['image'], $row['cityID']);
            $people->peopleID = $row['peopleID'];
            $city = new City($row['cityName']);
            $city->cityID = $row['cityID'];
            $results[] = [$people, $city];
        }
        return $results;
    }
    public function getID($id)
    {
        $sql = "SELECT people.*, city.cityID, city.cityName FROM people INNER JOIN city 
        ON people.cityID = city.cityID WHERE peopleID = $id";
        $statements = $this->connection->prepare($sql);
        $statements->execute();
        $row = $statements->fetch();
        $people = new People($row['name'], $row['age'], $row['gender'], $row['image'], $row['cityID']);
        $people->peopleID = $row['peopleID'];
        $city = new City($row['cityName']);
        $city->id = $row['cityID'];
        $results = [$people, $city];
        return $results;
    }
    public function update($id, $people){
        $sql = "UPDATE people SET name = ?, age = ?, gender = ?, image = ?,
         cityID = ? WHERE peopleID = ?";
        $statements = $this->connection->prepare($sql);
        $statements->bindParam(1, $people->name);
        $statements->bindParam(2, $people->age);
        $statements->bindParam(3, $people->gender);
        $statements->bindParam(4, $people->image);
        $statements->bindParam(5, $people->cityID);
        $statements->bindParam(6, $id);
        $statements->execute();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM people WHERE peopleID = $id";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
    // public function search($keyWord)
    // {
    //     $sql = "SELECT * FROM city INNER JOIN country on city.countryID = country.countryID WHERE cityName LIKE '$keyWord' OR countryName LIKE '$keyWord'";
    //     $statements = $this->connection->prepare($sql);
    //     $statements->execute();
    //     $rows = $statements->fetchAll();
    //     $results = [];
    //     $numRows = 0;
    //     foreach($rows as $key => $row){
    //         $city = new City($row['cityName'], $row['cityArea'], $row['cityPopulation'], $row['cityGdp'], $row['cityIntro'], $row['countryID']);
    //         $city->cityID = $row['cityID'];
    //         $country = new Country($row['countryID'], $row['countryName'], $row['countryFlag']);
    //         $results[] = [$city, $country];
    //     }
    //     return $results;
    // }
}

