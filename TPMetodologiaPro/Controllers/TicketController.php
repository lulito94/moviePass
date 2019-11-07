<?php
namespace Controllers;

class TicketController{


    function __construct()
    {
        
    }


    public function ShowSelectFunction($id_cinema,$id_movie)
    {
        $_SESSION['MovieElect'] = $id_movie;
        require_once(VIEWS_PATH."FunctionSelect.php");
    }

    public function ShowSelectVoucher($funct)
    {
        $_SESSION['funct'] = $funct;
        require_once(VIEWS_PATH."GenerateVoucher.php");
    }
    public function ShowPayTicket()
    {
        require_once(VIEWS_PATH."BuyTicket.php");
    }
    public function BuyTicket()
    {}

}
?>