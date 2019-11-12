<?php

namespace Controllers;

// Meter las peliculas en los cines
use Models\Cinema as Cinema;
use DAO\CinemaDAO as CinemaDAO;
use DAO\CinemaDAODB as CinemaDAODB;
use DAO\MovieDAODB as MovieDAODB;
use Models\Room as Room;
use Models\MovieFunction as MovieFunction;

class CinemaController
{
    //private $CinemaDAO; js
    private $CinemaDAODB;
    private $FunctionList;
    private $MovieDAODB;
    //Constructor
    function __construct()
    {
       // $this->CinemaDAO = new CinemaDAO(); js
       $this->CinemaDAODB = new CinemaDAODB();
       $this->MovieDAODB = new MovieDAODB();
       
    }
    //--------------------------------------------------------------------------------------


    //  Show's!!

    public function ShowCinemaView()
    {
        require_once(VIEWS_PATH . "Cinema-add.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowUserMenu($idCinema){
        $_SESSION['cinemaElect']=$idCinema;
        require_once(VIEWS_PATH . "User-menu.php");
        
    }
    //--------------------------------------------------------------------------------------
    public function ShowCinemaModify()
    {
        require_once(VIEWS_PATH . "Cinema-Modify.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowCinemaListView()
    {
        //$cinemasList = $this->CinemaDAO->GetAll();js
        $cinemasList = $this->CinemaDAODB->GetAll();

        require_once(VIEWS_PATH . "CinemaList.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowRoomList()
    {
        require_once (VIEWS_PATH . "RoomList.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowRoomFunctions()
    {
        require_once (VIEWS_PATH . "RoomFunctions.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowRoomModify()
    {
        require_once (VIEWS_PATH . "RoomModify.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowModifyFunction($id_function)
    {
        $_SESSION['idFunction'] = $id_function;
        require_once(VIEWS_PATH."FunctionModify.php");
    }
    //--------------------------------------------------------------------------------------
    public function showModify()
    {
        require_once(VIEWS_PATH . "Cinema-Modify.php");

    }
    //--------------------------------------------------------------------------------------
    public function ShowAddRoom()
    {
        require_once(VIEWS_PATH."RoomAdd.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowAddFunction()
    {
        require_once(VIEWS_PATH."SelectCinema.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowSelectRoom()
    {
        require_once(VIEWS_PATH."SelectRoom.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowSelectMovie()
    {
        require_once(VIEWS_PATH."SelectMovie.php");
    }
    //--------------------------------------------------------------------------------------
    public function SelectRoom($idCinema)
    {
        $_SESSION['idCinema'] = $idCinema;
        $this->ShowSelectRoom();
    }
    //--------------------------------------------------------------------------------------
    public function SelectMovie($id_room)
    {
        $_SESSION['idRoom'] = $id_room;
        $this->ShowSelectMovie();
    }
    //--------------------------------------------------------------------------------------
    public function SetIdCinema($idCinema)
    {
        $_SESSION['idCinema'] = $idCinema;
        $this->ShowCinemaModify();
    }
    //--------------------------------------------------------------------------------------
    public function SetIdRoom($idRoom)
    {
        $_SESSION['idRoom'] = $idRoom;
        $this->ShowRoomModify();
    }
    //--------------------------------------------------------------------------------------
    public function AddMovie($idMovie)
    {
        $_SESSION['idMovie'] = $idMovie;
        $this->ShowFunction();
    }
    //--------------------------------------------------------------------------------------
    public function ShowFunction()
    {
        require_once(VIEWS_PATH."FunctionAdd.php");
    }
    //--------------------------------------------------------------------------------------
    public function ShowFunctions()
    {
        $this->FunctionList = $this->GetAllMoviesFunctions();
        require_once(VIEWS_PATH."FunctionList.php");
    }
    //--------------------------------------------------------------------------------------

    //Cinema Functions
    public function Add($cinemaName,$address,$capacity,$ticketValue){
        $cinema = new Cinema();
        $cinema->setCinemaName($cinemaName);
        $cinema->setAddress($address);
        $cinema->setCapacity($capacity);
        $cinema->setTicketValue($ticketValue);
        $cinema->setRooms(null);
        
        $repo = $this->CinemaDAODB;
        $newCinema = $repo->GetCinemaByName($cinemaName);
        if(!empty($newCinema)){
            echo "<script>alert('El nombre del cinema ya fue registrado previamente');</script>";
            $this->ShowCinemaListView();
        }else
        {
            $repo->Add($cinema);
            echo "<script>alert('Cinema agregado exitosamente!');</script>";
            $this->ShowCinemaListView();
        }
    }
    //--------------------------------------------------------------------------------------
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
    //--------------------------------------------------------------------------------------
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
    //--------------------------------------------------------------------------------------

    //Room's Functions 

    public function AddRoom($roomName,$seatings)
    {
        $check = $this->CinemaDAODB->getRoomByName($roomName);
        if(!isset($check) && empty($check))
        {
            $room = new Room();
            $room->setRoom_name($roomName);
            $room->setSeating($seatings);
            $this->CinemaDAODB->AddRoom($_SESSION['idCinema'],$room);
            unset($_SESSION['idCinema']);
            $this->ShowCinemaListView();
        }else{
            echo "<script>alert('El nombre de la sala ya fue registrado previamente');</script>";
            $this->ShowCinemaListView();
        }
    }
    //--------------------------------------------------------------------------------------
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
    //--------------------------------------------------------------------------------------
    public function DeleteRoom($id_room)
    {
        $repo = $this->CinemaDAODB;
        $repo->DeleteRoom($id_room);
        $this->ShowRoomList();
    }
    //--------------------------------------------------------------------------------------

    //Function's Function

    public function AddMovieFunction($function_date)
    {
        $this->CinemaDAODB->AddMovieFunction($function_date);
        // Unset's
        unset($_SESSION['idRoom']);
        unset($_SESSION['idCinema']);
        unset($_SESSION['idMovie']);
        //------------------
        echo "<script>alert ('Cines Actualizados');</script>";
        $this->ShowFunctions();
    }
    //--------------------------------------------------------------------------------------
    public function ModifyFunction($function_date)
    {
        $repo = $this->CinemaDAODB;
        $repo->ModifyMovieFunction($_SESSION['idFunction'],$function_date);
        unset($_SESSION['idFunction']);
        $this->ShowFunctions();
    }
    //--------------------------------------------------------------------------------------

    public function GetAllMoviesFunctions()
    {
         $MFList = array();
         $MovieFunctionList = $this->CinemaDAODB->GetAllMovieFunctions();
         foreach($MovieFunctionList as $MovieFunction)
         {
         $function = new MovieFunction();
         $function->setId_Function($MovieFunction->getId_Function());
         //To object
         $cinema = $this->CinemaDAODB->GetCinemaById($MovieFunction->getCinema());
         $room = $this->CinemaDAODB->GetRoomByIdRoom($MovieFunction->getRoom());
         $movie = $this->MovieDAODB->GetMovieById($MovieFunction->getMovie());
         //----
         $function->setCinema($cinema);
         $function->setRoom($room);
         $function->setMovie($movie);
         $function->setFunction_time($MovieFunction->getFunction_time());
         array_push($MFList, $function);
         }
         return $MFList;
    }
    //--------------------------------------------------------------------------------------
    public function GetMovieFunctionsByCinema($idCinema)
    {
        $MFList = array();
         $MovieFunctionList = $this->CinemaDAODB->GetMovieFunctionsByCinema($idCinema);

         foreach($MovieFunctionList as $MovieFunction)
         {
         $function = new MovieFunction();
         $function->setId_Function($MovieFunction->getId_Function());
         //To object
         $cinema = $this->CinemaDAODB->GetCinemaById($MovieFunction->getCinema());
         $room = $this->CinemaDAODB->GetRoomByIdRoom($MovieFunction->getRoom());
         $movie = $this->$MovieDAODB->GetMovieById($MovieFunction->getMovie());
         //----
         $function->setCinema($cinema);
         $function->setRoom($room);
         $function->setMovie($movie);
         $function->setFunction_time($MovieFunction->getFunction_time());
         array_push($MFList, $function);
         }
         return $MFList;
    }
    //--------------------------------------------------------------------------------------
    public function GetMovieFunctionById($id_function)
    {
         $MovieFunction = $this->CinemaDAODB->GetMovieFunctionById($id_function);

         foreach($MovieFunction as $MF)
         {
         $function = new MovieFunction();
         $function->setId_Function($MF->getId_Function());
         //To object
         $cinema = $this->CinemaDAODB->GetCinemaById($MF->getCinema());
         $room = $this->CinemaDAODB->GetRoomByIdRoom($MF->getRoom());
         $movie = $this->$MovieDAODB->GetMovieById($MF->getMovie());
         //----
         $function->setCinema($cinema);
         $function->setRoom($room);
         $function->setMovie($movie);
         $function->setFunction_time($MF->getFunction_time());
         }
         return $function;
    }
    //--------------------------------------------------------------------------------------
    public function DeleteFunction($id_function)
    {
        $repo = $this->CinemaDAODB;
        $repo->DeleteMovieFunction($id_function);
        echo "<script>alert ('Funciones Actualizadas');</script>";
        $this->ShowFunctions();
    }
    //--------------------------------------------------------------------------------------   
}
?>