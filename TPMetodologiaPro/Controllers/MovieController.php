<?php
namespace Controllers;
//Use's
use Models\Movie as Movie;
//-----------
use DAO\MovieDAO as MovieDAO;
use DAO\MovieDAODB as MovieDAODB;
//-----------

    //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");

class MovieController
{
    //private $CinemaDAO; js
    private $MovieDAODB;

    //Constructor
    function __construct()
    {
        $this->MovieDAODB = new MovieDAODB();
    }
    //-----------------

    //Show's
    public function ShowAdminMenu()
    {
        //Return to Admin-Menu
        require_once(VIEWS_PATH . "admin-menu.php");
    }
    //-----------------------------------------------------

    //Movie Function's
    public function Add()
    {
        $moviesJS = new MovieDAO();
        $movieList = $moviesJS->GetAll();

        foreach ($movieList as $valuesArray) {
            //set new movie

            $movie = new Movie();
            $movie->setId_movie($valuesArray->getId_movie());
            $movie->setPopularity($valuesArray->getPopularity());
            $movie->setTitle($valuesArray->getTitle());
            $movie->setRelease_date($valuesArray->getRelease_date());
            $movie->setOriginal_language($valuesArray->getOriginal_language());
            $movie->setVote_count($valuesArray->getVote_count());
            $movie->setPoster_path($valuesArray->getPoster_path());
            $movie->setVote_average($valuesArray->getVote_average());
            $movie->setOverview($valuesArray->getOverview());
            $movie->setGenre_ids($valuesArray->getGenre_ids());

            $this->MovieDAODB->Add($movie);
        }
        echo "<script>alert('Peliculas Cargadas en BD');</script>";
        
        $this->ShowAdminMenu();
    }
    //-----------------------------------------------------
    public function GetToApiGenres()
    {
        $repo = new MovieDAODB();
        $repo->AddGenres();
        echo "<script>alert('Generos cargados en BD');</script>";
        $this->ShowAdminMenu();
    }
    //-----------------------------------------------------
    public function showMovies()
    {
        require_once(VIEWS_PATH."ListMovies.php");
    }

}
