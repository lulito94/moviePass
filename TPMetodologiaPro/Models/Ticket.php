<?php
namespace Models;


class Ticket{

    private $id_ticket;
    private $cant_locations;
    private $function;
    

    /**
     * Get the value of cant_locations
     */ 
    public function getCant_locations()
    {
        return $this->cant_locations;
    }

    /**
     * Set the value of cant_locations
     *
     * @return  self
     */ 
    public function setCant_locations($cant_locations)
    {
        $this->cant_locations = $cant_locations;

        return $this;
    }

    /**
     * Get the value of function
     */ 
    public function getFunction()
    {
        return $this->function;
    }

    /**
     * Set the value of function
     *
     * @return  self
     */ 
    public function setFunction($function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get the value of id_ticket
     */ 
    public function getId_ticket()
    {
        return $this->id_ticket;
    }

    /**
     * Set the value of id_ticket
     *
     * @return  self
     */ 
    public function setId_ticket($id_ticket)
    {
        $this->id_ticket = $id_ticket;

        return $this;
    }
}
?>