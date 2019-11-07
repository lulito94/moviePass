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

    public function ShowSelectVoucher($functId)
    {
        $_SESSION['functId'] = $functId;
        require_once(VIEWS_PATH."GenerateVoucher.php");
    }
    public function ShowPayTicket($cant)
    {
        $_SESSION['cant'] = $cant;
        require_once(VIEWS_PATH."BuyTicket.php");
    }
    
    public function BuyTicket()
    {
        require_once(VIEWS_PATH."TicketView.php");
    }

}
?>