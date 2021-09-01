<?php 
namespace Model;

class CityDB
{
    public $connection;

    public function __construct($connection)
    {
        $this -> connection = $connection;
    }
    public function create($city)
    {
        $sql = "INSERT INTO city(`cityName`, `cityArea`, `cityPopulation`, `cityGdp`, `cityIntro`, `countryID`)
        VALUE (?, ?, ?, ?, ?, ?)";
        $statements = $this->connection->prepare($sql);
        $statements->bindParam(1, $city->cityName); 
        $statements->bindParam(2, $city->cityArea); 
        $statements->bindParam(3, $city->cityPopulation); 
        $statements->bindParam(4, $city->cityGdp);
        $statements->bindParam(5, $city->cityIntro);
        $statements->bindParam(6, $city->countryID);
        return $statements->execute();
    }
    public function getAll(){
        $sql = "SELECT * FROM city INNER JOIN country ON city.countryID = country.countryID";
        $statements = $this->connection->prepare($sql);
        $statements->execute();
        $rows = $statements->fetchAll();
        $results = [];
        foreach($rows as $key => $row){
            $city = new City($row['cityName'], $row['cityArea'], $row['cityPopulation'], $row['cityGdp'], $row['cityIntro'], $row['countryID']);
            $city->cityID = $row['cityID'];
            $country = new Country($row['countryName'], $row['countryFlag']);
            $country->countryID = $row['countryID'];
            $results[] = [$city, $country];
        }
        return $results;
    }
    public function getID($id)
    {
        $sql = "SELECT * FROM city INNER JOIN country ON city.countryID = country.countryID WHERE cityID = $id;";
        $statements = $this->connection->prepare($sql);
        $statements->execute();
        $row = $statements->fetch();
        $city = new City($row['cityName'], $row['cityArea'], $row['cityPopulation'], $row['cityGdp'], $row['cityIntro'], $row['countryID']);
        $city->cityID = $row['cityID'];
        $country = new Country($row['countryName'], $row['countryFlag']);
        $country->countryID = $row['countryID'];
        $results = [$city, $country];
        return $results;
    }
    public function update($id, $city){
        $sql = "UPDATE city SET cityName = ?, cityArea = ?, cityPopulation = ?,
        cityGdp = ?, cityIntro = ?, countryID = ? WHERE cityID = ?";
        $statements = $this->connection->prepare($sql);
        $statements->bindParam(1, $city->cityName);
        $statements->bindParam(2, $city->cityArea);
        $statements->bindParam(3, $city->cityPopulation);
        $statements->bindParam(4, $city->cityGdp);
        $statements->bindParam(5, $city->cityIntro);
        $statements->bindParam(6, $city->countryID);
        $statements->bindParam(7, $id);
        $statements->execute();
    }
    public function delete($id)
    {
        $sql = "DELETE FROM city WHERE cityID = $id";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
    public function search($keyWord)
    {
        $sql = "SELECT * FROM search WHERE cityName LIKE '$keyWord' OR countryName LIKE '$keyWord'";
        $statements = $this->connection->prepare($sql);
        $statements->execute();
        $rows = $statements->fetchAll();
        $results = [];
        $numRows = 0;
        foreach($rows as $key => $row){
            $city = new City($row['cityName'], $row['cityArea'], $row['cityPopulation'], $row['cityGdp'], $row['cityIntro'], $row['countryID']);
            $city->cityID = $row['cityID'];
            $country = new Country($row['countryName'], $row['countryFlag']);
            $country->countryID = $row['countryID'];
            $results[] = [$city, $country];
        }
        return $results;
    }
    function rowCount($id){
        $sql = "SELECT * FROM city WHERE cityID = $id";
        $statements = $this->connection->prepare($sql);
        $statements->execute();
        $rowCount = $statements->rowCount();
        return $rowCount;
    }
}

