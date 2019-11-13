<?php
namespace Models;

class Purchases{

    private $id_purchase;
    private $user;
    private $ticket;
    private $amount;
    private $purchase_time;

    /**
     * Get the value of id_purchase
     */ 
    public function getId_purchase()
    {
        return $this->id_purchase;
    }

    /**
     * Set the value of id_purchase
     *
     * @return  self
     */ 
    public function setId_purchase($id_purchase)
    {
        $this->id_purchase = $id_purchase;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of ticket
     */ 
    public function getTicket()
    {
        return $this->ticket;
    }

    /**
     * Set the value of ticket
     *
     * @return  self
     */ 
    public function setTicket($ticket)
    {
        $this->ticket = $ticket;

        return $this;
    }

    /**
     * Get the value of amount
     */ 
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Set the value of amount
     *
     * @return  self
     */ 
    public function setAmount($amount)
    {
        $this->amount = $amount;

        return $this;
    }

    /**
     * Get the value of purchase_time
     */ 
    public function getPurchase_time()
    {
        return $this->purchase_time;
    }

    /**
     * Set the value of purchase_time
     *
     * @return  self
     */ 
    public function setPurchase_time($purchase_time)
    {
        $this->purchase_time = $purchase_time;

        return $this;
    }
}
?>