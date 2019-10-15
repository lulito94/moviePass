<?php
namespace Controllers;
use Models\Movie as Movie;
use DAO\MovieDAODB as MovieDAODB;

class MovieController{
    private $MovieDAODB;

    function __construct()
    {
       $this->MovieDAODB = new MovieDAODB();
    }

    public function test()
    {
        echo "entra aca";
        $repo = $this->MovieDAODB->getToApi();
        $repo2 = $repo['results'];
        var_dump($repo2);
        
    }



    
}
?>