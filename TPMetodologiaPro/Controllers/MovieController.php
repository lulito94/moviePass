<?php
namespace Controllers;
use Models\Movie as Movie;
use DAO\MovieDAO as MovieDAO;

class MovieController{
    

    function RequestMovies()
    {
        $repo = new MovieDAO();
        $jsonObject = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=c65889a54974a405a970caef706f7005');
        $result = json_decode($jsonObject, true);
        $movieList = $result['results'];
        $movie = new Movie();
    
        
        foreach($movieList as $valuesArray)
        {
               
            $movie->setId($valuesArray["id"]);
            $movie->setPopularity($valuesArray["popularity"]);
            $movie->setTitle($valuesArray["title"]);
            $movie->setRelease_date($valuesArray["release_date"]);
            $movie->setOriginal_language($valuesArray["original_language"]);
            $movie->setOriginal_title($valuesArray["original_title"]);
            $movie->setVote_count($valuesArray["vote_count"]);
            $movie->setVote_average($valuesArray["vote_average"]);
            $movie->setIsAdult($valuesArray["adult"]);
            $movie->setOverview($valuesArray["overview"]);
            $repo->Add($movie);
        }
    }
}
?>