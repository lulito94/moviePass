<?php
namespace DAO;
use Models\Cinema as Cinema;
use DAO\Connection as Connection;


class CinemaDAODB {

    private $cinemasList = array();
    private $connection;
    private $tableName = "Cinemas";
    public function Add(Cinema $cinema)
    {
       
        try
        {
            $query = "INSERT INTO ".$this->tableName." (cinemaName, address, capacity, ticketValue) VALUES (:cinemaName, :address, :capacity, :ticketValue);";
            
            $parameters["cinemaName"] = $cinema->getCinemaName();
            $parameters["address"] = $cinema->getAddress();
            $parameters["capacity"] = $cinema->getCapacity();
            $parameters['ticketValue'] = $cinema->getTicketValue();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try
        {
            $cinemaList = array();

            $query = "SELECT * FROM ".$this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            
            foreach ($resultSet as $row)
            {                
                $cinema = new Cinema();
                $cinema->setCinemaName($row["cinemaName"]);
                $cinema->setAddress($row["address"]);
                $cinema->setCapacity($row["capacity"]);
                $cinema->setTicketValue($row["ticketValue"]);

                array_push($cinemaList, $cinema);
            }

            return $cinemaList;
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }

    public function DeleteCinema($cinemaName)
    {
        try
        {
            $cinemaList = $this->GetAll();
            foreach($cinemaList as $cinemaToRemove)
            {
            
                if($cinemaToRemove->getCinemaName() == $cinemaName)
                {
                    $query = "DELETE FROM ".$this->tableName." WHERE ". $this->tableName . ".cinemaName ='$cinemaName'";
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
    public function ModifyCinema(Cinema $cinema,Cinema $newCinema)
    {
        try
        {
            $cinemaList = $this->GetAll();
            foreach($cinemaList as $cinemaToRemove)
            {
            
                if($cinemaToRemove->getCinemaName() == $cinema->getCinemaName())
                {
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }
        }
        catch(Exception $ex)
        {
            throw $ex;
        }
    }
}

?>