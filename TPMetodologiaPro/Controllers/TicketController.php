<?php
namespace Controllers;

//Use's
use Models\Ticket as Ticket;
use Models\User as User;
//-------------------------------
use DAO\TicketDAO as TicketDAO;
//-------------------------------
use DAO\CinemaDAODB as CinemaDAODB;

    

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
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        $_SESSION['MovieElect'] = $id_movie;
        require_once(VIEWS_PATH."FunctionSelect.php");
    }
    //---------------------------------------------------
    public function ShowSelectFunctionNotLogged($id_cinema,$id_movie)
    {
        $_SESSION['MovieElect'] = $id_movie;
        require_once(VIEWS_PATH."FunctionSelect.php");
    }
    //---------------------------------------------------
    public function ShowUserMenuNotLogged($idCinema)
    {
        $_SESSION['cinemaElect'] = $idCinema;
        require_once(VIEWS_PATH . "menu.php");
    }
    //---------------------------------------------------
    public function ShowSelectVoucher($functId)
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        $_SESSION['functId'] = $functId;
        require_once(VIEWS_PATH."GenerateVoucher.php");
    }
    //---------------------------------------------------
    public function ShowPayTicket()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        require_once(VIEWS_PATH."BuyTicket.php");
    }
    //---------------------------------------------------
    public function BuyTicket()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
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

        // Aca guardo el nuevo valor en base de datos para actualizar
        $repo->UpdateSeatings($_SESSION['functId'],$_SESSION['cant']);

        
        echo "<script>alert('Compra realizada con exito!');</script>";
        require_once(VIEWS_PATH."TicketView.php");
    }
    //---------------------------------------------------
    public function Qr()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        require_once(VIEWS_PATH."Qr-view.php");
    }
    //---------------------------------------------------
    public function userToPurchase()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        require_once(VIEWS_PATH."user-ToPurchase.php");
    }
    //---------------------------------------------------
    public function userPurchases()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        require_once(VIEWS_PATH."user_Purchases.php");
    }
    //---------------------------------------------------
    public function userInfo()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        require_once(VIEWS_PATH."user_Info.php");
    }
    //---------------------------------------------------
    public function Ajax()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        require_once(VIEWS_PATH."ajax_generate_code.js");
    }
    //---------------------------------------------------

    //Ticket Function's
    public function GenerateTicket($cant)
    {
      //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");  
        $_SESSION['cant'] = $cant;
        require_once(VIEWS_PATH."CalculateSeatings.php");
 
        $this->ShowPayTicket();
    }
    //---------------------------------------------------
    public function userViewGenre()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        require_once(VIEWS_PATH."UserViewMoviesxGenres.php");
    }
    //---------------------------------------------------
    public function userViewDate()
    {
       //Protect Controller
       require_once(VIEWS_PATH."ValidateControllers.php");
       require_once(VIEWS_PATH."UserViewMoviesxDate.php");
    }
    //---------------------------------------------------
    public function userViewGenreWithButton($id_genre)
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        $_SESSION['id_genre'] = $id_genre;
        require_once(VIEWS_PATH."UserViewMoviesxGenres.php");
    }
    //---------------------------------------------------
    public function userViewDateWithButton($search)
    {
        require_once(VIEWS_PATH."ValidateControllers.php");
        $_SESSION['date'] = $search;
        require_once(VIEWS_PATH."UserViewMoviesxDate.php");
    }
    public function SendEmail()
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        echo "<script>alert ('Se le ha enviado al mail su comprobante con el código QR');</script>";
        echo "<script>alert ('Gracias por elegir Movie Style;</script>";
        require_once(VIEWS_PATH."User-menu.php");
    }
    public function Goback(){
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        $this->userToPurchase();
    }

    

}
?>