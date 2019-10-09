<?php
namespace Models;

class Cinema{

    private $cinemaName;
    private $address;
    private $openingHours;
    private $closingHours;
    private $rooms;


    public function getCinemaName()
    {
        return $this->cinemaName;
    }

    public function setCinemaName($cinemaName)
    {
        $this->cinemaName = $cinemaName;

        return $this;
    }
    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    public function getOpeningHours()
    {
        return $this->openingHours;
    }

    public function setOpeningHours($openingHours)
    {
        $this->openingHours = $openingHours;

        return $this;
    }

    public function getClosingHours()
    {
        return $this->closingHours;
    }

    public function setClosingHours($closingHours)
    {
        $this->closingHours = $closingHours;

        return $this;
    }

    public function getRooms()
    {
        return $this->rooms;
    }
    public function setRooms($rooms)
    {
        $this->rooms = $rooms;

        return $this;
    }
}

?>