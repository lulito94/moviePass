<?php
namespace Models;

class Room{
    private $id_room;
    private $seating;
    private $room_name;


    


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
     * Get the value of seating
     */ 
    public function getSeating()
    {
        return $this->seating;
    }

    /**
     * Set the value of seating
     *
     * @return  self
     */ 
    public function setSeating($seating)
    {
        $this->seating = $seating;

        return $this;
    }

    /**
     * Get the value of room_name
     */ 
    public function getRoom_name()
    {
        return $this->room_name;
    }

    /**
     * Set the value of room_name
     *
     * @return  self
     */ 
    public function setRoom_name($room_name)
    {
        $this->room_name = $room_name;

        return $this;
    }
}
?>