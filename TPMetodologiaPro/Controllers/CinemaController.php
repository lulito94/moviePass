<?php

namespace Controllers;

// Meter las peliculas en los cines
use Models\Cinema as Cinema;
use DAO\CinemaDAO as CinemaDAO;
use DAO\CinemaDAODB as CinemaDAODB;
use Models\Room as Room;
use Models\MovieFunction as MovieFunction;

class CinemaController
{

    //private $CinemaDAO; js
    private $CinemaDAODB;

    function __construct()
    {
       // $this->CinemaDAO = new CinemaDAO(); js
       $this->CinemaDAODB = new CinemaDAODB();
       
    }

    public function ShowCinemaView()
    {
        require_once(VIEWS_PATH . "Cinema-add.php");
    }
    public function ShowCinemaModify()
    {
        require_once(VIEWS_PATH . "Cinema-Modify.php");
    }

    public function ShowCinemaListView()
    {
        //$cinemasList = $this->CinemaDAO->GetAll();js
        $cinemasList = $this->CinemaDAODB->GetAll();

        require_once(VIEWS_PATH . "CinemaList.php");
    }

    public function ShowRoomList()
    {
        require_once (VIEWS_PATH . "RoomList.php");
    }

    public function ShowRoomFunctions()
    {
        require_once (VIEWS_PATH . "RoomFunctions.php");
    }

    public function ShowRoomModify()
    {
        require_once (VIEWS_PATH . "RoomModify.php");
    }

    public function ShowModifyFunction($id_function)
    {
        $_SESSION['idFunction'] = $id_function;
        require_once(VIEWS_PATH."FunctionModify.php");
    }
    
    public function Add($cinemaName,$address,$capacity,$ticketValue){
        $cinema = new Cinema();
        $cinema->setCinemaName($cinemaName);
        $cinema->setAddress($address);
        $cinema->setCapacity($capacity);
        $cinema->setTicketValue($ticketValue);
        $cinema->setRooms(null);
        

        try{
          $repo = $this->CinemaDAODB;
           $repo->Add($cinema);
           echo "<script>alert('Cinema agregado exitosamente!');</script>";
           $this->ShowCinemaListView();
        }catch(PDOException $e)
        {
            $e->getmessage();
            echo "<script>alert('$e->getmessage()');</script>";
            $this->ShowCinemaView();
        }
    }

    public function showModify()
    {
        require_once(VIEWS_PATH . "Cinema-Modify.php");

    }
    public function Delete($cinemaName)
    {
        try{
            $repo = $this->CinemaDAODB;
           $repo->DeleteCinema($cinemaName);
           echo "<script>alert ('Cines Actualizados');</script>";
           $this->ShowCinemaListView();
        }catch (PDOException $e)
        {
            $e->getmessage();
        }
    }

    public function ShowAddRoom()
    {
        require_once(VIEWS_PATH."RoomAdd.php");
    }
    public function ShowAddFunction()
    {
        require_once(VIEWS_PATH."SelectCinema.php");
    }

    public function AddRoom($roomName,$seatings)
    {
        $room = new Room();
        $room->setRoom_name($roomName);
        $room->setSeating($seatings);
        $repo = $this->CinemaDAODB;
        $repo->AddRoom($_SESSION['idCinema'],$room);
        unset($_SESSION['idCinema']);
        $this->ShowCinemaListView();
    }

    public function DeleteRoom($id_room)
    {
        $repo = $this->CinemaDAODB;
        $repo->DeleteRoom($id_room);
        $this->ShowRoomList();
    }

    public function DeleteFunction($id_function)
    {
        $repo = $this->CinemaDAODB;
        $repo->DeleteMovieFunction($id_function);
        echo "<script>alert ('Funciones Actualizadas');</script>";
        $this->ShowFunctions();
    }
    public function ModifyRoom($roomName,$seatings)
    {

        $repo = $this->CinemaDAODB;
        $room = new Room();
        $room->setRoom_name($roomName);
        $room->setSeating($seatings);
    
        $repo->ModifyRoom($_SESSION['idRoom'],$room);
        unset($_SESSION['idRoom']);
        $this->ShowRoomList();
    }

    public function ShowSelectRoom()
    {
        require_once(VIEWS_PATH."SelectRoom.php");
    }

    public function ShowSelectMovie()
    {
        require_once(VIEWS_PATH."SelectMovie.php");
    }

    public function SelectRoom($idCinema)
    {
        $_SESSION['idCinema'] = $idCinema;
        $this->ShowSelectRoom();
    }
    public function SelectMovie($id_room)
    {
        $_SESSION['idRoom'] = $id_room;
        $this->ShowSelectMovie();
    }

    public function Modify($cinemaName,$address,$capacity,$ticketValue)
    {

        $updatedCinema = new Cinema();
        $updatedCinema->setCapacity($capacity);
        $updatedCinema->setAddress($address);
        $updatedCinema->setCinemaName($cinemaName);
        $updatedCinema->setTicketValue($ticketValue);



            try{
                $repo = $this->CinemaDAODB;
                $repo->ModifyCinema($updatedCinema);
                unset($_SESSION['idCinema']);
                echo "<script>alert ('Cines Actualizados');</script>";
                $this->ShowCinemaListView();
                
                }catch (PDOException $e){
                $e->getMessage();
            }
    }

    public function SetIdCinema($idCinema)
    {
        $_SESSION['idCinema'] = $idCinema;
        $this->ShowCinemaModify();
    }

    public function SetIdRoom($idRoom)
    {
        $_SESSION['idRoom'] = $idRoom;
        $this->ShowRoomModify();
    }
    public function AddMovie($idMovie)
    {
        $_SESSION['idMovie'] = $idMovie;
        $this->ShowFunction();
    }

    public function ShowFunction()
    {
        require_once(VIEWS_PATH."FunctionAdd.php");
    }
    
    public function ShowFunctions()
    {
        require_once(VIEWS_PATH."FunctionList.php");
    }
    public function AddMovieFunction($function_date)
    {
        $MovieFunction = new MovieFunction();
        $MovieFunction->setId_room($_SESSION['idRoom']);
        $MovieFunction->setId_movie($_SESSION['idMovie']);
        $MovieFunction->setFunction_time($function_date);

        $repo = $this->CinemaDAODB;
        $repo->AddMovieFunction($MovieFunction);
        unset($_SESSION['idRoom']);
        unset($_SESSION['idCinema']);
        unset($_SESSION['idMovie']);
        echo "<script>alert ('Cines Actualizados');</script>";
        $this->ShowFunctions();
    }

    public function ModifyFunction($function_date)
    {
        $repo = $this->CinemaDAODB;
        $repo->ModifyMovieFunction($_SESSION['idFunction'],$function_date);
        unset($_SESSION['idFunction']);
        $this->ShowFunctions();
    }

    
}
?>