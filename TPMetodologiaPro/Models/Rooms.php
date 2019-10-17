<?php
namespace Models;

class Rooms{
    private $id;
    private $seating;
    private $name;


    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

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
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }
}
?>