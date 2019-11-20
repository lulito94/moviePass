<?php
namespace Models;

class MovieFunction{
    private $id_function;
    private $cinema;
    private $room;
    private $movie;
    private $function_time;
    private $availableSeatings;
    

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
     * Get the value of cinema
     */ 
    public function getCinema()
    {
        return $this->cinema;
    }

    /**
     * Set the value of cinema
     *
     * @return  self
     */ 
    public function setCinema($cinema)
    {
        $this->cinema = $cinema;

        return $this;
    }

    /**
     * Get the value of room
     */ 
    public function getRoom()
    {
        return $this->room;
    }

    /**
     * Set the value of room
     *
     * @return  self
     */ 
    public function setRoom($room)
    {
        $this->room = $room;

        return $this;
    }

    /**
     * Get the value of movie
     */ 
    public function getMovie()
    {
        return $this->movie;
    }

    /**
     * Set the value of movie
     *
     * @return  self
     */ 
    public function setMovie($movie)
    {
        $this->movie = $movie;

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
    /**
     * Get the value of availableSeatings
     */ 
    public function getAvailableSeatings()
    {
        return $this->availableSeatings;
    }

    /**
     * Set the value of availableSeatings
     *
     * @return  self
     */ 
    public function setAvailableSeatings($seatings)
    { 
        $this->availableSeatings = $seatings;

        return $this;
    }
    }


?>