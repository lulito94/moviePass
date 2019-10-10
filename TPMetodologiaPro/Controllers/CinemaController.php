<?php

namespace Controllers;

// Meter las peliculas en los cines
use Models\Cinema as Cinema;
use DAO\CinemaDAO as CinemaDAO;

class CinemaController
{

    private $CinemaDAO;

    function __construct()
    {
        $this->CinemaDAO = new CinemaDAO();
    }

    public function ShowCinemaView()
    {
        require_once(VIEWS_PATH . "Cinema-add.php");
    }

    public function ShowCinemaListView()
    {
        $cinemasList = $this->CinemaDAO->GetAll();

        require_once(VIEWS_PATH . "CinemaList.php");
    }

    public function Add($cinemaName,$address,$openingHours,$closingHours,$capacity){
        $cinema = new Cinema();
        echo "hola";
        $cinema->setCinemaName($cinemaName);
        $cinema->setAddress($address);
        $cinema->setOpeningHours($openingHours);
        $cinema->setClosingHours($closingHours);
        $cinema->setCapacity($capacity);
        
        $repo = new CinemaDAO();

        $newcinema = $repo->getByCinemaName($cinema->getCinemaName());
        if(!empty($newcinema)) {
            echo "<script>alert('El cine ya se encuentra registrado');</script>";
            $this->ShowCinemaView();
        }
        else{

        $repo->Add($cinema);
        echo "<script>alert('El cine fue generado con exito');</script>";
        $this->ShowCinemaListView();
        }

    }
}
?>