<?php
namespace Controllers;
use Models\Movie as Movie;
use DAO\MovieDAO as MovieDAO;
use DAO\MovieDAODB as MovieDAODB;

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

    public function ShowCinemaListView()
    {
        //$cinemasList = $this->CinemaDAO->GetAll();js
        $cinemasList = $this->CinemaDAODB->GetAll();

        require_once(VIEWS_PATH . "CinemaList.php");
    }

    public function Add($cinemaName,$address,$capacity,$ticketValue){
        $cinema = new Cinema();
        $cinema->setCinemaName($cinemaName);
        $cinema->setAddress($address);
        $cinema->setCapacity($capacity);
        $cinema->setTicketValue($ticketValue);
        

        try{
           $repo = new CinemaDAODB();
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
    public function AddToJson($cinemaName,$address,$capacity,$ticketValue)
    {
        $cinema = new Cinema();
        $cinema->setCinemaName($cinemaName);
        $cinema->setAddress($address);
        $cinema->setCapacity($capacity);
        $cinema->setTicketValue($ticketValue);

        $repo = new CinemaDAO();

        $newcinema = $repo->GetByCinemaName($cinema->getCinemaName());
        if(!empty($newcinema))
        {
            echo "<script>alert ('El cine ya se encuentra registrado');</script>";
            $this->ShowCinemaView();
        }
        else
        {
            $repo->Add($cinema);
            echo "<script>alert ('EEl cine fue generado con exito');</script>";
            $this->ShowCinemaListView();
        }

    }
    public function delete($cinemaName)
    {
        try{
            $repo = new CinemaDAODB();
           $repo->DeleteCinema($cinemaName);
           echo "<script>alert ('Cines Actualizados');</script>";
           $this->ShowCinemaListView();
        }catch (PDOException $e)
        {
            $e->getmessage();
        }
    }
    public function modify($cinemaName,$ticketValue)
    {
        try{
            $repo = new CinemaDAODB();
            $repo->ModifyCinema($cinemaName,$ticketValue);
            echo "<script>alert ('Cines Actualizados');</script>";
            $this->ShowCinemaListView();
         
        }catch (PDOException $e)
        {
            $e->getmessage();
        }
    }
}
?>