<?php 
namespace Model;

class CountryDB
{
    public $connection;

    public function __construct($connection)
    {
        $this -> connection = $connection;
    }
    public function create($country)
    {
        echo'<pre>';
        print_r($country);
        echo '</pre>';
        $sql = "INSERT INTO country(countryName, countryFlag) VALUES (?, ?)";
        $statements = $this->connection->prepare($sql);
        $statements->bindParam(1, $country->countryName); 
        $statements->bindParam(2, $country->countryFlag); 
        return $statements->execute();
    }
    public function getAll(){
        $sql = "SELECT * FROM country";
        $statements = $this->connection->prepare($sql);
        $statements->execute();
        $rows = $statements->fetchAll();
        $countries = [];
        foreach($rows as $key => $row){
            $country = new Country($row['countryName'], $row['countryFlag']);
            $country->countryID = $row['countryID'];
            $countries[] = $country;
        }
        return $countries;
    }
    public function getID($id)
    {
        $sql = "SELECT * FROM country WHERE countryID = $id;";
        $statements = $this->connection->prepare($sql);
        $statements->execute();
        $row = $statements->fetch();
        $country = new Country($row['countryName'], $row['countryFlag']);
        $country->countryID = $row['countryID'];
        return $country;
    }
    public function update($id, $country){
        // $sql = "UPDATE country SET countryName = ?, country = ? WHERE countryID = ?";
        echo $sql = "UPDATE country SET countryName = '$country->countryName', countryFlag = '$country->countryFlag' WHERE countryID= $id";
        
        $statements = $this->connection->prepare($sql);
        // $statements->bindParam(1, $country->countryName);
        // $statements->bindParam(2, $country->countryFlag);
        // $statements->bindParam(3, $id);
        return $statements->execute();
    }
    public function delete($id){
        $sql = "DELETE FROM country WHERE countryID = $id";
        $statement = $this->connection->prepare($sql);
        $statement->execute();
    }
}

