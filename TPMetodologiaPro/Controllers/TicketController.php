<?php
namespace Controllers;

//Use's
use Models\Ticket as Ticket;
use Models\User as User;
//-------------------------------
use DAO\TicketDAO as TicketDAO;
//-------------------------------
use DAO\CinemaDAODB as CinemaDAODB;

use PHPMailer\PHPMailer\PHPMailer;


    

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
    //---------------------------------------------------
    public function SendEmail($id_ticket)
    {
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");

require './vendor/autoload.php';
$ToEmail = "matiadri2005@gmail.com";
$Mail = new PHPMailer();
$linkqr = "https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=".$id_ticket."";

$Body = $this->FormatToMail($linkqr,$_SESSION['loggeduser']->getUserName());
            $Mail->IsSMTP(); // Use SMTP
            $Mail->Host        = "smtp.gmail.com"; // Sets SMTP server
            $Mail->SMTPDebug   = 0; // 2 to enable SMTP debug information
            $Mail->SMTPOptions = array(
                'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true)
                );
            $Mail->SMTPAuth    = TRUE; // enable SMTP authentication
            $Mail->SMTPSecure  = "tls"; //Secure conection
            $Mail->Port        = 587; // set the SMTP port
            $Mail->Username    = 'matiadri2005@gmail.com'; // SMTP account username
            $Mail->Password    = 'elpandadeoro10'; // SMTP account password
            $Mail->Priority    = 1; // Highest priority - Email priority (1 = High, 3 = Normal, 5 = low)
            $Mail->CharSet     = 'UTF-8';
            $Mail->Encoding    = '8bit';
            $Mail->Subject     = 'Tickets from Movie Style';
            $Mail->ContentType = 'text/html; charset=utf-8\r\n';
            $Mail->From        = 'matiadri2005@gmail.com';
            $Mail->FromName    = 'Matias';
            $Mail->WordWrap    = 900; // RFC 2822 Compliant for Max 998 characters per line
            $Mail->AddAddress( $ToEmail ); // To:
            $Mail->isHTML( TRUE );
            $Mail->Body    = $Body;
            $Mail->AltBody = "";
            $Mail->Send();
            $Mail->SmtpClose();

            /*if ( $Mail->IsError() ) { // ADDED - This error checking was missing
              return FALSE;
            }
            else {
              return TRUE;
            }*/

        require_once(VIEWS_PATH."User-menu.php");
    }
    //---------------------------------------------------
    public function Goback(){
        //Protect Controller
require_once(VIEWS_PATH."ValidateControllers.php");
        $this->userToPurchase();
    }
    //---------------------------------------------------
    public function FormatToMail($link,$userName)
    {
        
$message  = "<html><body>";
   
$message .= "<table width='100%' bgcolor='#e0e0e0' cellpadding='0' cellspacing='0' border='0'>";
   
$message .= "<tr><td>";
   
$message .= "<table align='center' width='100%' border='0' cellpadding='0' cellspacing='0' style='max-width:650px; background-color:#fff; font-family:Verdana, Geneva, sans-serif;'>";
    
$message .= "<thead>
  <tr height='80'>
  <th colspan='4' style='background-color:#f5f5f5; border-bottom:solid 1px #bdbdbd; font-family:Verdana, Geneva, sans-serif; color:#333; font-size:34px;' >Entrada con QR de Movie Style! </th>
  </tr>
             </thead>";
    
$message .= "<tbody>
             
       <tr>
       <td colspan='4' style='padding:15px;'>
       <p style='font-size:20px;'>Hola ".$userName.".</p>
       <hr />
       <p style='font-size:25px;'>Movie Style le desea disfrute su compra, le adjuntamos aca mismo el qr con la entrada correspondiente. Muchas gracias por elegirnos!</p>
       <img src=".$link." alt='Qr Ticket' title='Qr Ticket' style='height:auto; width:100%; max-width:100%;' />
       <p style='font-size:15px; font-family:Verdana, Geneva, sans-serif;'> .</p>
       </td>
       </tr>
      
              </tbody>";
    
$message .= "</table>";
   
$message .= "</td></tr>";
$message .= "</table>";
   
$message .= "</body></html>";
return $message;
    }
    //---------------------------------------------------

    

}

?>