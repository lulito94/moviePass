<?php
namespace Models;
// Al dao ya le llega todo el objeto asociado
 //3 inserts 
 //en el controlador vamos a traer el
 // id de la rooom de la pelucla y un neww function con el horario y le asignams las dos cosas
class MovieFunction{
    private $id_function;
    private $id_room;
    private $id_movie;
    private $function_time;

  

    /**
     * Get the value of id_function
     */ 
    public function getId_function()
    {
        return $this->id_function;
    }

    /**
     * Set the value of id_function
     *
     * @return  self
     */ 
    public function setId_function($id_function)
    {
        $this->id_function = $id_function;

        return $this;
    }

    /**
     * Get the value of id_room
     */ 
    public function getId_room()
    {
        return $this->id_room;
    }

    /**
     * Set the value of id_room
     *
     * @return  self
     */ 
    public function setId_room($id_room)
    {
        $this->id_room = $id_room;

        return $this;
    }

    /**
     * Get the value of id_movie
     */ 
    public function getId_movie()
    {
        return $this->id_movie;
    }

    /**
     * Set the value of id_movie
     *
     * @return  self
     */ 
    public function setId_movie($id_movie)
    {
        $this->id_movie = $id_movie;

        return $this;
    }


    /**
     * Get the value of function_time
     */ 
    public function getFunction_time()
    {
        return $this->function_time;
    }

    /**
     * Set the value of function_time
     *
     * @return  self
     */ 
    public function setFunction_time($function_time)
    {
        $this->function_time = $function_time;

        return $this;
    }
}
 
?>