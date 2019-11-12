<?php
namespace Controllers;

class TicketController{



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
    
    public function Qr()
    {
        require_once(VIEWS_PATH."Qr-view.php");
    }

    public function Ajax()
    {
        require_once(VIEWS_PATH."ajax_generate_code.js");
    }

}
?>