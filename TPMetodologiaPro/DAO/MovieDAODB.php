<?php
namespace DAO;
use Models\Movie as Movie;


class MovieDAODB {

    private $MoviesList = array();
    private $connection;
    private $tableName = "Movies";



    public function getToApi()
    {
    $repo = new MovieDAO();
    $jsonObject = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=c65889a54974a405a970caef706f7005');
    $result = json_decode($jsonObject, true);
    return $result;
    }

}
    ?>