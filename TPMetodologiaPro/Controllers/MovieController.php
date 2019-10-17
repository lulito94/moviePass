<?php
namespace Controllers;
use Models\Movie as Movie;
use DAO\MovieDAO as MovieDAO;
use DAO\MovieDAODB as MovieDAODB;

class MovieController
{

    //private $CinemaDAO; js
    private $MovieDAODB;

    function __construct()
    {
       $this->MovieDAODB = new MovieDAODB();
    }

    public function Add()
    {
    $repo = $this->MovieDAODB;
    $moviesJS = new MovieDAO();
    $movie = new Movie();
    $movieList = $moviesJS->GetAll();      
    foreach($movieList as $valuesArray){
        $movie->setId($valuesArray->getId());
                $movie->setPopularity($valuesArray->getPopularity());
                $movie->setTitle($valuesArray->getTitle());
                $movie->setRelease_date($valuesArray->getRelease_date());
                $movie->setOriginal_language($valuesArray->getOriginal_language());
                $movie->setVote_count($valuesArray->getVote_count());
                $movie->setPoster_path($valuesArray->getPoster_path());
                $movie->setVote_average($valuesArray->getVote_average());
                $movie->setOverview($valuesArray->getOverview());
                $movie->setGenre_ids($valuesArray->getGenre_ids());
               $repo->Add($movie);
               
    }
    
    
    }
    public function GetToApiGenres()
    {
        $repo = new MovieDAODB();
       $repo->AddGenres();
    }

}
?>