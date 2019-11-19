<?php
namespace Controllers;

//Use's
use Models\Ticket as Ticket;
use Models\User as User;
//-------------------------------
use DAO\TicketDAO as TicketDAO;
//-------------------------------
use DAO\CinemaDAODB as CinemaDAODB;

    //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");

class TicketController{
    private $TicketDAO;

    //Constructor
    function __construct()
    {
        $this->TicketDAO = new TicketDAO();
    }
    //--------------------------

    //Show's
    public function ShowSelectFunction($id_cinema,$id_movie)
    {
        $_SESSION['MovieElect'] = $id_movie;
        require_once(VIEWS_PATH."FunctionSelect.php");
    }
    //---------------------------------------------------
    public function ShowSelectVoucher($functId)
    {
        $_SESSION['functId'] = $functId;
        require_once(VIEWS_PATH."GenerateVoucher.php");
    }
    //---------------------------------------------------
    public function ShowPayTicket()
    {
        require_once(VIEWS_PATH."BuyTicket.php");
    }
    //---------------------------------------------------
    public function BuyTicket()
    {
        $repo = new CinemaDAODB();
       $cinema = $repo->GetCinemaById($_SESSION['cinemaElect']);
       if(!isset($_SESSION['newPrice']))
       {
        $amount = ($_SESSION['cant'] * $cinema->getTicketValue());
       }else{
           $amount = $_SESSION['newPrice'];
       }
        $ticketList = $this->TicketDAO->getAllTickets();
        foreach($ticketList as $ticket)
        {
            $id_last = $ticket->getId_ticket();
        }
        $user = new User();
        $user = $_SESSION['loggeduser'];
        $this->TicketDAO->AddPurchase($user->getId_user(),$id_last,$amount);
        echo "<script>alert('Compra realizada con exito!');</script>";
        require_once(VIEWS_PATH."TicketView.php");
    }
    //---------------------------------------------------
    public function Qr()
    {
        require_once(VIEWS_PATH."Qr-view.php");
    }
    //---------------------------------------------------
    public function userToPurchase()
    {
        require_once(VIEWS_PATH."user-ToPurchase.php");
    }
    //---------------------------------------------------
    public function userPurchases()
    {
        require_once(VIEWS_PATH."user_Purchases.php");
    }
    //---------------------------------------------------
    public function userInfo()
    {
        require_once(VIEWS_PATH."user_Info.php");
    }
    //---------------------------------------------------
    public function Ajax()
    {
        require_once(VIEWS_PATH."ajax_generate_code.js");
    }
    //---------------------------------------------------

    //Ticket Function's
    public function GenerateTicket($cant)
    {
        $_SESSION['cant'] = $cant;
        $this->TicketDAO->AddTicket($cant);

        echo "<script>alert('Ticket Generado con exito!');</script>";
        $this->ShowPayTicket();
    }
    //---------------------------------------------------
    public function userViewGenre($id_genre)
    {
        $_SESSION['id_genre'] = $id_genre;
        require_once(VIEWS_PATH."UserViewMoviesxGenres.php");
    }
    public function SendEmail()
    {
        mail("pepito@desarrolloweb.com,maria@guiartemultimedia.com","asuntillo","Este es el cuerpo del mensaje"); 
    }
    

}
?>