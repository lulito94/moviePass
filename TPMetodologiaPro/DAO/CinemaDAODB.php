<?php

namespace DAO;

use Models\Cinema as Cinema;
use DAO\Connection as Connection;
use Models\Room as Room;
use Models\MovieFunction as MovieFunction;
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
    public function GetCinemaById($idCinema)
    {
        try {

            $query = "SELECT * FROM " . $this->tableName . " WHERE " . $this->tableName . ".idCinema = '$idCinema'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $cinema = new Cinema;
                $cinema->setIdCinema($row["idCinema"]);
                $cinema->setCinemaName($row["cinemaName"]);
                $cinema->setAddress($row["address"]);
                $cinema->setCapacity($row["capacity"]);
                $cinema->setTicketValue($row["ticketValue"]);
                
                $RoomsList = $this->GetRoomById($cinema->getIdCinema());
                foreach ($RoomsList as $room) {
                    $cinema->setRooms($room);
                }
            }
            return $cinema;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    
    public function GetCinemaIdByRoomId($id_room)
    {

        try {

            $query = "SELECT " . $this->tableName . ".idCinema FROM Rooms JOIN " . $this->tableName . " ON " . $this->tableName . ".idCinema = Rooms.idCinema WHERE Rooms.id_room = '$id_room'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            $ids = null;
            foreach ($resultSet as $result) {
                $ids = $result;
            }
            return $ids[0];
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function GetCinemaByName($cinemaName){
        try {
            $cinema = null;
            $query = "SELECT * FROM " . $this->tableName . " WHERE " . $this->tableName . ".cinemaName = '$cinemaName'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $cinema = new Cinema;
                $cinema->setIdCinema($row["idCinema"]);
                $cinema->setCinemaName($row["cinemaName"]);
                $cinema->setAddress($row["address"]);
                $cinema->setCapacity($row["capacity"]);
                $cinema->setTicketValue($row["ticketValue"]);
                
                $RoomsList = $this->GetRoomById($cinema->getIdCinema());
                foreach ($RoomsList as $room) {
                    $cinema->setRooms($room);
                }
            }
            return $cinema;
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

                $RoomsList = $this->GetRoomById($cinema->getIdCinema());
                foreach ($RoomsList as $room) {
                    $cinema->setRooms($room);
                }
                array_push($cinemaList, $cinema);
            }


            return $cinemaList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    
    public function ModifyCinema(Cinema $newCinema)
    {
        try {
            $cinemaList = $this->GetAll();
            $SearchCinema = $_SESSION['idCinema'];


            foreach ($cinemaList as $list) {
                if ($list->getIdCinema() == $SearchCinema) {
                    $cinemaRepo = $list;
                }
            }

            $name = $newCinema->getCinemaName();
            $address = $newCinema->getAddress();
            $capacity = $newCinema->getCapacity();
            $ticketValue = $newCinema->getTicketValue();


            //Check Integrity of dates
            if (!isset($name) || $name == "") {
                $name = $cinemaRepo->getCinemaName();
            }
            if (!isset($address) || $address == "") {
                $address = $cinemaRepo->getAddress();
            }
            if (!isset($capacity) || $capacity == null) {
                $capacity = $cinemaRepo->getCapacity();
            }
            if (!isset($ticketValue) || $ticketValue == null) {
                $ticketValue = $cinemaRepo->getTicketValue();
            }


            foreach ($cinemaList as $cmod) {

                if ($cmod->getIdCinema() == $SearchCinema) {
                    $query = "UPDATE " . $this->tableName . " SET cinemaName ='$name', address ='$address', capacity ='$capacity',ticketValue ='$ticketValue'  WHERE " . $this->tableName . ".idCinema ='$SearchCinema'";
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }
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
                    $RoomList = $this->GetRoomById($cinemaToRemove->getIdCinema());
                    if ($RoomList) {
                        foreach ($RoomList as $room) {
                            $this->DeleteRoom($room->getId_room());
                        }
                        $query = "DELETE FROM " . $this->tableName . " WHERE " . $this->tableName . ".cinemaName ='$cinemaName'";
                        $this->connection = Connection::GetInstance();
                        $this->connection->ExecuteNonQuery($query);
                    }
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function AddRoom($idCinema, Room $room)
    {
        try {
            $query = "INSERT INTO Rooms (seating,room_name,id_room,idCinema) VALUES (:seating,:room_name,:id_room,:idCinema);";

            $parameters["seating"] = $room->getSeating();
            $parameters["room_name"] = $room->getRoom_name();
            $parameters["id_room"] = $room->getId_room();
            $parameters['idCinema'] = $idCinema; // Aca le paso el id del cine al que quiero que 
            // le agregue la sala

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function GetRoomById($idCinema)
    {
        try {
            $roomList = array();
            $query = "SELECT Rooms.id_room,Rooms.seating,Rooms.room_name FROM Rooms JOIN " . $this->tableName . " ON " . $this->tableName . ".idCinema = Rooms.idCinema WHERE " . $this->tableName . ".idCinema = '$idCinema'";

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


    public function GetAllRooms()
    {
        try {
            $RoomList = array();

            $query = "SELECT * FROM Rooms";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $room = new Room();
                $room->setId_room($row["id_room"]);
                $room->setRoom_name($row["room_name"]);
                $room->setSeating($row["seating"]);
                array_push($RoomList, $room);
            }


            return $RoomList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    
    public function ModifyRoom($idRoom, Room $room)
    {
        try {
            $roomList = $this->GetAllRooms();


            foreach ($roomList as $list) {
                if ($list->getId_room() == $idRoom) {
                    $roomRepo = $list;
                }
            }

            $room_name = $room->getRoom_name();
            $seating = $room->getSeating();


            //Check Integrity of dates
            if (!isset($room_name) || $room_name == "") {
                $room_name = $roomRepo->getRoom_name();
            }
            if (!isset($seating) || $seating == "") {
                $seating = $roomRepo->getSeating();
            }



            foreach ($roomList as $cmod) {

                if ($cmod->getId_room() == $idRoom) {
                    $query = "UPDATE Rooms SET room_name ='$room_name', seating ='$seating' WHERE Rooms.id_room ='$idRoom'";
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function DeleteRoom($idRoom)
    {

        try {
            $RoomList = $this->GetAllRooms();
            foreach ($RoomList as $room) {

                if ($room->getId_room() == $idRoom) {
                    $query = "DELETE FROM Rooms  WHERE Rooms.id_room ='$idRoom'";
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

   


   



    public function AddMovieFunction(MovieFunction $function)
    {
        try {
            $query = "INSERT INTO MovieFunctions (idCinema,id_room, id_movie, function_time) VALUES (:idCinema, :id_room, :id_movie, :function_time);";

            $parameters["idCinema"] = $_SESSION['idCinema'];
            $parameters["id_room"] = $function->getId_room();
            $parameters["id_movie"] = $function->getId_movie();
            $parameters["function_time"] = $function->getFunction_time();

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetAllMovieFunctions()
    {

        try {
            $functionList = array();
            $query = "SELECT * FROM MovieFunctions";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $function = new MovieFunction();
                $function->setId_function($row["id_function"]);
                $function->setId_room($row["id_room"]);
                $function->setId_movie($row["id_movie"]);
                $function->setFunction_time($row["function_time"]);

                array_push($functionList, $function);
            }
            return $functionList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function GetMovieFunctions($id_cinema)
    {
        try {
            $functionList = array();
            $query = "SELECT MovieFunctions.id_function,MovieFunctions.id_room,MovieFunctions.id_movie,MovieFunctions.function_time  FROM " .
                $this->tableName . " JOIN Rooms ON " . $this->tableName . ".idCinema = Rooms.idCinema JOIN MovieFunctions ON " .
                "MovieFunctions.id_room = Rooms.id_room Join Movies ON MovieFunctions.id_movie = Movies.id_movie WHERE MovieFunctions.idCinema ='$id_cinema'";


            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $function = new MovieFunction();
                $function->setId_function($row["id_function"]);
                $function->setId_room($row["id_room"]);
                $function->setId_movie($row["id_movie"]);
                $function->setFunction_time($row["function_time"]);


                array_push($functionList, $function);
            }

            return $functionList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function DeleteMovieFunction($id_function)
    {

        try {
            $functionList = $this->GetAllMovieFunctions();
            foreach ($functionList as $function) {

                if ($function->getId_function() == $id_function) {
                    $query = "DELETE FROM MovieFunctions  WHERE MovieFunctions.id_function ='$id_function'";
                    $this->connection = Connection::GetInstance();
                    $this->connection->ExecuteNonQuery($query);
                }
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }


    public function ModifyMovieFunction($id_function, $newFunction_time)
    {

        try {
            $oldFunction = $this->GetMovieFunctionById($id_function);
            if ($oldFunction != null) {
                $oldId_function = $oldFunction->getId_function();
                $query = "UPDATE MovieFunctions SET function_time = '$newFunction_time' WHERE MovieFunctions.id_function = '$id_function'";
                $this->connection = Connection::GetInstance();
                $this->connection->ExecuteNonQuery($query);
            }
        } catch (Exception $ex) {
            throw $ex;
        }
    }

    public function GetMovieFunctionById($id_function)
    {
        try {

            $query = "SELECT * FROM MovieFunctions WHERE MovieFunctions.id_function = '$id_function'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $function = new MovieFunction();
                $function->setId_function($row["id_function"]);
                $function->setId_room($row["id_room"]);
                $function->setId_movie($row["id_movie"]);
                $function->setFunction_time($row["function_time"]);
            }
            return $function;
        } catch (Exception $ex) {
            throw $ex;
        }
    }

 

}
?>