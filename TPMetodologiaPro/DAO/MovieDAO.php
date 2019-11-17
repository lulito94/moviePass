<?php
namespace DAO;

use Models\Movie as Movie;

//Json DAO----

class MovieDAO implements IMovieDAO{
    
    private $movieList = array();
    


    public function GetAll(){
        $this->RetrieveData();
        return $this->MovieList;
    }

    public function GetByMovieName($MovieName){
        $this->RetrieveData();
        $movieFounded = null;
        
        if(!empty($this->MovieList)){
            foreach($this->MovieList as $movie){
                if($movie->getTitle() == $MovieName){
                    $movieFounded = $movie;
                }
            }
        }

        return $movieFounded;
    }

    public function getToApi()
    {
    $repo = new MovieDAO();
    $jsonObject = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=c65889a54974a405a970caef706f7005');
    $result = json_decode($jsonObject, true);
    //https://api.themoviedb.org/3/genre/movie/list?api_key=<<api_key>>&language=en-US
    return $result;
    }
    
    

    public function Add($newMovie){
        
        $this->RetrieveData();
        
        array_push($this->MovieList, $newMovie);

        $this->SaveData();
    }
    public function DeleteMovie($movieTodrop)
    {

            $this->RetrieveData();
    
            foreach($this->movieList as $movie){
    
                if($movie->getTitle() == $movieTodrop->getTitle()){
                    $key = array_search($movie, $this->movieList);
                    unset($this->movieList[$key]);
                }
            }
    
            $this->SaveData();
    
    }

    //Json Persistence
    public function SaveData()
    {
        $arrayToEncode = array();

        foreach($this->MovieList as $movie)
        {
            $valuesArray["id"] = $movie->getId();
            $valuesArray["popularity"] = $movie->getPopularity();
            $valuesArray["title"] = $movie->getTitle();
            $valuesArray["release_date"] = $movie->getRelease_date();
            $valuesArray["original_language"] = $movie->getOriginal_language();
            $valuesArray["vote_count"] = $movie->getVote_count();
            $valuesArray["poster_path"] = $movie->getPoster_path();
            $valuesArray["vote_average"] = $movie->getVote_average();
            $valuesArray["isAdult"] = $movie->getIsAdult();
            $valuesArray["overview"] = $movie->getOverview();
            $valuesArray["genre_ids"] = $movie->getGenre_ids();
            
            array_push($arrayToEncode, $valuesArray);
        }

        $jsonContent = json_encode($arrayToEncode, JSON_PRETTY_PRINT);
        
        file_put_contents('Data/Movies.json', $jsonContent);
    }

    private function RetrieveData()
    {
        $this->MovieList = array();
        //$arrayToDecode = $this->getToApi(); #Solo para traer de la bd (api)
     // $arrayToDecode =  file_get_contents('Data/Movies.json'); // Aca habia un users
            //$arrayToDecode2 = $arrayToDecode['results'];
            $jsonContent =  file_get_contents('Data/Movies.json');
            $arrayToDecode = ($jsonContent) ? json_decode($jsonContent, true) : array();
            foreach($arrayToDecode as $valuesArray)
            {
                $movie = new Movie();
                
                $movie->setId_movie($valuesArray["id"]);
                $movie->setPopularity($valuesArray["popularity"]);
                $movie->setTitle($valuesArray["title"]);
                $movie->setRelease_date($valuesArray["release_date"]);
                $movie->setOriginal_language($valuesArray["original_language"]);
                $movie->setVote_count($valuesArray["vote_count"]);
                $movie->setPoster_path($valuesArray["poster_path"]);
                $movie->setVote_average($valuesArray["vote_average"]);
                $movie->setIsAdult($valuesArray["isAdult"]);
                $movie->setOverview($valuesArray["overview"]);
                $movie->setGenre_ids($valuesArray["genre_ids"]);

                array_push($this->MovieList, $movie);
            }
        }
    
}

?>