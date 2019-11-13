<?php
namespace Controllers;
use Models\Ticket as Ticket;
use DAO\TicketDAO as TicketDAO;


class TicketController{
    private $TicketDAO;

    function __construct()
    {
        $this->TicketDAO = new TicketDAO();
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
    public function ShowPayTicket()
    {
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

    public function GenerateTicket($cant)
    {
        $this->TicketDAO->AddTicket($cant);
        echo "<script>alert('Ticket Generado con exito!');</script>";
        $this->ShowPayTicket();
    }
    

}
?>