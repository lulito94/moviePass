<?php
namespace Models;

class Cinema{
    private $idCinema;
    private $cinemaName;
    private $address;
    private $capacity;
    private $ticketValue;
    private $rooms = array();


    /**
     * Get the value of cinemaName
     */ 
    public function getCinemaName()
    {
        return $this->cinemaName;
    }

    /**
     * Set the value of cinemaName
     *
     * @return  self
     */ 
    public function setCinemaName($cinemaName)
    {
        $this->cinemaName = $cinemaName;

        return $this;
    }

    /**
     * Get the value of address
     */ 
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */ 
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of capacity
     */ 
    public function getCapacity()
    {
        return $this->capacity;
    }

    /**
     * Set the value of capacity
     *
     * @return  self
     */ 
    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;

        return $this;
    }

    /**
     * Get the value of ticketValue
     */ 
    public function getTicketValue()
    {
        return $this->ticketValue;
    }

    /**
     * Set the value of ticketValue
     *
     * @return  self
     */ 
    public function setTicketValue($ticketValue)
    {
        $this->ticketValue = $ticketValue;

        return $this;
    }

    /**
     * Get the value of rooms
     */ 
    public function getRooms()
    {
        return $this->rooms;
    }

    /**
     * Set the value of rooms
     *
     * @return  self
     */ 
    public function setRooms($room)
    {
        array_push($this->rooms,$room);
    }


    /**
     * Get the value of idCinema
     */ 
    public function getIdCinema()
    {
        return $this->idCinema;
    }

    /**
     * Set the value of idCinema
     *
     * @return  self
     */ 
    public function setIdCinema($idCinema)
    {
        $this->idCinema = $idCinema;

        return $this;
    }
}

?>