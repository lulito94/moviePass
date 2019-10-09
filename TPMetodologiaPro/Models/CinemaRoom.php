<?php
namespace Models;


class CinemaRoom{

    private $roomNumber;
    private $seats;
    private $isThreeDimensional;
    

    /**
     * Get the value of roomNumber
     */ 
    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    /**
     * Set the value of roomNumber
     *
     * @return  self
     */ 
    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;

        return $this;
    }

    /**
     * Get the value of seats
     */ 
    public function getSeats()
    {
        return $this->seats;
    }

    /**
     * Set the value of seats
     *
     * @return  self
     */ 
    public function setSeats($seats)
    {
        $this->seats = $seats;

        return $this;
    }

    

    

    /**
     * Get the value of isThreeDimensional
     */ 
    public function getIsThreeDimensional()
    {
        return $this->isThreeDimensional;
    }

    /**
     * Set the value of isThreeDimensional
     *
     * @return  self
     */ 
     public function setIsThreeDimensional($isThreeDimensional) //modificar el booleano
    {
        $this->isThreeDimensional = $isThreeDimensional;

        return $this;
    }

}

?>