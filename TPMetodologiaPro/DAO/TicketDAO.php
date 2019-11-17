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
    
}
?>