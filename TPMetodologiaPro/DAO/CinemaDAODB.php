<?php

namespace DAO;

use Models\Cinema as Cinema;
use DAO\Connection as Connection;
use Models\Room as Room;
use Exception;

class CinemaDAODB
{

    private $cinemasList = array();
    private $connection;
    private $tableName = "Cinemas";
    public function Add(Cinema $cinema)
    {

        try {
            $query = "INSERT INTO " . $this->tableName . " (cinemaName, address, capacity, ticketValue) VALUES (:cinemaName, :address, :capacity, :ticketValue);";

            $parameters["cinemaName"] = $cinema->getCinemaName();
            $parameters["address"] = $cinema->getAddress();
            $parameters["capacity"] = $cinema->getCapacity();
            $parameters['ticketValue'] = $cinema->getTicketValue();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetAll()
    {
        try {
            $cinemaList = array();

            $query = "SELECT * FROM " . $this->tableName;

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $cinema = new Cinema();
                $cinema->setIdCinema($row["idCinema"]);
                $cinema->setCinemaName($row["cinemaName"]);
                $cinema->setAddress($row["address"]);
                $cinema->setCapacity($row["capacity"]);
                $cinema->setTicketValue($row["ticketValue"]);
            
            $RoomsList = $this->GetRooms($cinema->getIdCinema());
            foreach($RoomsList as $room)
            {
                $cinema->setRooms($room);
            }
            array_push($cinemaList,$cinema);
        }


            return $cinemaList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function DeleteCinema($cinemaName)
    {
        try {
            $cinemaList = $this->GetAll();
            foreach ($cinemaList as $cinemaToRemove) {

                if ($cinemaToRemove->getCinemaName() == $cinemaName) {
                    $query = "DELETE FROM " . $this->tableName . " WHERE " . $this->tableName . ".cinemaName ='$cinemaName'";
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetRooms($idCinema)
    {
        try {
            $roomList = array();
            $query = "SELECT Rooms.id_room,Rooms.seating,Rooms.room_name FROM Rooms JOIN ". $this->tableName. " ON " . $this->tableName.".idCinema = Rooms.idCinema WHERE ". $this->tableName.".idCinema = '$idCinema'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
           
            foreach ($resultSet as $row) {
                $room = new Room();
                $room->setSeating($row["seating"]);
                $room->setRoom_name($row["room_name"]);
                $room->setId_room($row["id_room"]);


                array_push($roomList, $room);
            }

            return $roomList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function ModifyCinema(Cinema $newCinema)
    {
        try {
            $cinemaList = $this->GetAll();
            $SearchCinema = $_SESSION['idCinema'];
            
            
            foreach($cinemaList as $list)
            {
                if($list->getIdCinema() == $SearchCinema)
                {
                    $cinemaRepo = $list;
                }
            }

            $name = $newCinema->getCinemaName();
            $address = $newCinema->getAddress();
            $capacity = $newCinema->getCapacity();
            $ticketValue = $newCinema->getTicketValue();


            //Check Integrity of dates
            if(!isset($name) || $name == "")
            {
                $name = $cinemaRepo->getCinemaName();
            }
            if(!isset($address) || $address == "")
            {
                $address = $cinemaRepo->getAddress();
            }
            if(!isset($capacity) || $capacity == null)
            {
                $capacity = $cinemaRepo->getCapacity();
            }
            if(!isset($ticketValue) || $ticketValue == null)
            {
                $ticketValue = $cinemaRepo->getTicketValue();
            }
        

            foreach ($cinemaList as $cmod) {

                if ($cmod->getIdCinema() == $SearchCinema) {
                     $query = "UPDATE " . $this->tableName . " SET cinemaName ='$name', address ='$address', capacity ='$capacity',ticketValue ='$ticketValue'  WHERE ".$this->tableName.".idCinema ='$SearchCinema'";
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }

        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function AddRoom($idCinema,Room $room)
    {
        try{
                        $query = "INSERT INTO Rooms (seating,room_name,id_room,idCinema) VALUES (:seating,:room_name,:id_room,:idCinema);";

                            $parameters["seating"] = $room->getSeating();
                            $parameters["room_name"] = $room->getRoom_name();
                            $parameters["id_room"] = $room->getId_room();
                            $parameters['idCinema'] = $idCinema; // Aca le paso el id del cine al que quiero que 
                            // le agregue la sala

                            $this->connection = Connection::GetInstance();

                            $this->connection->ExecuteNonQuery($query, $parameters);
                            
        }catch(Exception $e)
        {
            throw $e;
        }
                    

    }

    public function ModifyRoom($idCinema, Room $room)
    {
        try {
            $cinemaList = $this->GetAll();
            foreach ($cinemaList as $cinema) {

                if ($cinema->getIdCinema() == $idCinema) {
                    for($i = 0; $i < count($cinema->getRooms());$i++)
                    {
                        $roomCompare = $cinema->getRooms();//Short form

                        if ($roomCompare->getId_room() == $room->getId_room()) {

                            $room_name = $room->getRoom_name();
                            $seating = $room->getSeating();
                            $id_room = $room->getId_room();

                            //check integrity of dates
                            if(!isset($room_name) || $room_name == "")
                            {
                                $room_name = $roomCompare->getRoom_name();
                            }
                            if(!isset($seating) || $seating == null)
                            {
                                $seating = $roomCompare->getSeating();
                            }
                           

                            $query = "UPDATE Rooms SET seating ='$seating', room_name ='$room_name' WHERE "." Rooms.idCinema ='$idCinema'";
                            $this->connection = Connection::GetInstance();
                            $this->connection->ExecuteNonQuery($query);
                        }
                    }

                }
                    
                } 
            
        } catch (Exception $ex) {
            throw $ex;
        }
    }
}
?>