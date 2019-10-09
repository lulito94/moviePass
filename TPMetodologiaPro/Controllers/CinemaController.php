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
        this->CinemaDAO = new CinemaDAO();
    }

    public function ShowAddView()
    {
        require_once(VIEWS_PATH . "Cinema-menu.php");
    }

    public function ShowCinemaListView()
    {
        $cinemasList = $this->CinemaDAO->GetAll();

        require_once(VIEWS_PATH . "CinemaList.php");
    }

    public function Add($cinemaName,$address,$openingHours,$closingHours,$capacity){
        $cinema = new CinemaDAO();

        $cinema->setCinemaName($cinemaName);
        $cinema->setAddress($address);
        $cinema->setOpeningHours($openingHours);
        $cinema->setClosingHours($closingHours);
        $cinema->setCapacity($capacity);
        
        this->CinemaDao->Add($cinema);

        this->ShowAddView();
    }
}
?>