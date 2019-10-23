<?php
namespace Controllers;

use Models\Room as Room;
use Models\MovieFunction as MovieFunction;
use DAO\MovieFunctionDAODB as MovieFunctionDAODB;

class MovieFunctionController{
    private $MovieFunctionDAODB;
    function __construct()
    {
       $this->MovieFunctionDAODB = new MovieFunctionDAODB();
    }


    public function Add($cinemaName,)
}



// Al dao ya le llega todo el objeto asociado
 //3 inserts 
 //en el controlador vamos a traer el
 // id de la rooom y de la pelucla y un neww function con el horario y le asignams las dos cosas


 ?>