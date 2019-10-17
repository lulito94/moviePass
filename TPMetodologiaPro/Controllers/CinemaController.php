<?php

namespace Controllers;

// Meter las peliculas en los cines
use Models\Cinema as Cinema;
use DAO\CinemaDAO as CinemaDAO;
use DAO\CinemaDAODB as CinemaDAODB;

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
            $repo = $this->CinemaDAODB;
            $repo->Add($cinema);
            echo "<script>alert ('EEl cine fue generado con exito');</script>";
            $this->ShowCinemaListView();
        }

    }
    public function showModify()
    {
        require_once(VIEWS_PATH . "Cinema-Modify.php");

    }
    public function delete($cinemaName)
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
    public function modify($cinemaName,$ticketValue)
    {
        try{
            echo $cinemaName . " cinema name";
            echo $ticketValue . " valor ";
            /*$repo->ModifyCinema($cinemaName,$ticketValue);
            echo "<script>alert ('Cines Actualizados');</script>";
            $this->ShowCinemaListView();
         */
        }catch (PDOException $e)
        {
           // $e->getmessage();
        }
    }
}
?>