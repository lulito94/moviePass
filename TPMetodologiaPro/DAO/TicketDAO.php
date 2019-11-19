<?php
namespace DAO;
//Use's
use Models\Ticket as Ticket;
use Models\Purchase as Purchase;
//--------------------------------
use DAO\Connection as Connection;
//--------------------------------

class TicketDAO extends HelperDAO implements ITicketDAODB
{
    private $connection;

    //Ticket Functions
    public function AddTicket($cant)
    {
       
        try {
            $query = "INSERT INTO Tickets (id_function, cant_locations) VALUES (:id_function, :cant_locations);";

            $parameters["id_function"] = $_SESSION['functId'];
            $parameters["cant_locations"] = $cant;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function AddPurchase($idUser,$idTicket,$amount)
    {
        try {
            $query = "INSERT INTO Purchases (idUser, id_ticket, amount) VALUES (:idUser, :id_ticket, :amount);";

            $parameters["idUser"] = $idUser;
            $parameters["id_ticket"] = $idTicket;
            $parameters["amount"] = $amount;

            $this->connection = Connection::GetInstance();

            $this->connection->ExecuteNonQuery($query, $parameters);
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //--------------------------------------------------------------------
    public function GetAllTickets()
    {
        try {
            $TicketList = array();
            $query = "SELECT * FROM Tickets";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            foreach ($resultSet as $row) {
                $ticket = new Ticket();
                $ticket->setId_ticket($row["id_ticket"]);
                $ticket->setCant_locations($row["cant_locations"]);
                $function = $this->GetMovieFunctionById($row["id_function"]);
                $ticket->setFunction($function);
               
                array_push($TicketList, $ticket);
            }


            return $TicketList;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //---------------------------------------------------------------------------------------------------------
    public function GetTicketsByUser($id_user)
    {
        try {
            $roomList = array();
            $query = "SELECT * FROM Tickets JOIN Purchases ON Tickets.id_ticket = Purchases.id_ticket WHERE Purchases.idUser = '$id_user'";

            $this->connection = Connection::GetInstance();

            $resultSet = $this->connection->Execute($query);

            return $resultSet;
        } catch (Exception $ex) {
            throw $ex;
        }
    }
    //---------------------------------------------------------------------------------------------------------
   
    
}
?>