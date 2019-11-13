<?php
namespace DAO;
use DAO\CinemaDAODB as CinemaDAODB;
use Models\Cinema as Cinema;
use DAO\Connection as Connection;
use Models\Room as Room;
use Models\Movie as Movie;
use Models\MovieFunction as MovieFunction;
use DAO\MovieDAODB as MovieDAODB;
use Exception;

class HelperDAO{
    private $connection;
        //MovieFunction
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
                // To object
                $cinema = $this->GetCinemaById($row['idCinema']);
                $room = $this->GetRoomByIdRoom($row['id_room']);
                $movie = $this->GetMovieById($row['id_movie']);
                //-----------------
                $function->setCinema($cinema);
                $function->setRoom($room);
                $function->setMovie($movie);
                $function->setFunction_time($row["function_time"]);

                array_push($functionList, $function);
            }
            return $functionList;
        } catch (Exception $ex) {
            throw $ex;
        }
        
        
    }
    //---------------------------------------------------------------------------------------------------------
    public function GetMovieById($id_movie)
    {
        $movie = null;
        try {
            $movie = null;

            
            $query = "SELECT * FROM Movies WHERE Movies.id_movie = '$id_movie'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $movie = new Movie();
                $movie->setId_movie($row["id_movie"]);
                $movie->setPopularity($row["popularity"]);
                $movie->setTitle($row["title"]);
                $movie->setRelease_date($row["release_date"]);
                $movie->setOriginal_language($row["original_language"]);
                $movie->setIsAdult($row["isAdult"]);
                $movie->setVote_count($row["vote_count"]);
                $movie->setPoster_path($row["poster_path"]);
                $movie->setVote_average($row["vote_average"]);
                $movie->setOverview($row["overview"]);
                $movie->setGenre_ids($row["id_genre"]);
            }
            return $movie;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //---------------------------------------------------------------------------------------------------------
    public function GetMovieFunctionsByCinema($id_cinema)
    {
        try {
            
            $functionList = array();
            $query = "SELECT MovieFunctions.id_function,MovieFunctions.idCinema,MovieFunctions.id_room,MovieFunctions.id_movie,MovieFunctions.function_time  FROM Cinemas JOIN Rooms ON Cinemas.idCinema = Rooms.idCinema JOIN MovieFunctions ON " .
                "MovieFunctions.id_room = Rooms.id_room Join Movies ON MovieFunctions.id_movie = Movies.id_movie WHERE MovieFunctions.idCinema ='$id_cinema'";


            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row) {
                $function = new MovieFunction();
                $function->setId_function($row["id_function"]);
                // To object
                $cinema = $this->GetCinemaById($row['idCinema']);
                $room = $this->GetRoomByIdRoom($row['id_room']);
                $movie = $this->GetMovieById($row['id_movie']);
                //-----------------
                $function->setCinema($cinema);
                $function->setRoom($room);
                $function->setMovie($movie);
                $function->setFunction_time($row["function_time"]);

                array_push($functionList, $function);
            }
            
            return $functionList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //---------------------------------------------------------------------------------------------------------
    public function GetMovieFunctionById($id_function)
    {
        try {

            $query = "SELECT * FROM MovieFunctions WHERE MovieFunctions.id_function = '$id_function'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $function = new MovieFunction();
                $function->setId_function($row["id_function"]);
                // To object
                $cinema = $this->GetCinemaById($row['idCinema']);
                $room = $this->GetRoomByIdRoom($row['id_room']);
                $movie = $this->GetMovieById($row['id_movie']);
                //-----------------
                $function->setCinema($cinema);
                $function->setRoom($room);
                $function->setMovie($movie);
                $function->setFunction_time($row["function_time"]);
            }
            return $function;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //---------------------------------------------------------------------------------------------------------
    public function GetRoomByIdRoom($id_room)
    {
        $room = null;
        try {
            $query = "SELECT * FROM Rooms WHERE Rooms.id_room = '$id_room'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);
            foreach ($resultSet as $row) {
                $room = new Room();
                $room->setSeating($row["seating"]);
                $room->setRoom_name($row["room_name"]);
                $room->setId_room($row["id_room"]);
            }

            return $room;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //---------------------------------------------------------------------------------------------------------
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
    //---------------------------------------------------------------------------------------------------------
    public function GetCinemaById($idCinema)
    {
           
        try {
            $cinema = null;

            $query = "SELECT * FROM Cinemas WHERE Cinemas.idCinema = '$idCinema'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $cinema = new Cinema;
                $cinema->setIdCinema($row["idCinema"]);
                $cinema->setCinemaName($row["cinemaName"]);
                $cinema->setAddress($row["address"]);
                $cinema->setCapacity($row["capacity"]);
                $cinema->setTicketValue($row["ticketValue"]);
                
                $RoomsList = $this->GetRoomsByCinema($cinema->getIdCinema());
                if(isset($RoomList))
                {
                foreach ($RoomsList as $room) {
                    $cinema->setRooms($room);
                }
                }else{
                    $cinema->setRooms(null);
                }
            }
            return $cinema;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //---------------------------------------------------------------------------------------------------------
    public function GetRoomsByCinema($idCinema)
    {
        try {
            $roomList = array();
            $query = "SELECT Rooms.id_room,Rooms.seating,Rooms.room_name FROM Rooms JOIN Cinemas ON Cinemas.idCinema = Rooms.idCinema WHERE Cinemas.idCinema = '$idCinema'";

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
    //--------------------------------------------------------------------------------------------------------

}


?>